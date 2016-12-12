<?php
namespace Remios\Utils\Database;

class Backups{
    
    function dbBackups($files=false, $full=true){
    	if(!$files) return false;
    	$tables = [];
		$result = \DB::select('SHOW TABLES');
	    if (!empty($result)) {
	        foreach ($result as $item) {
	            $item = (array)$item;
	            if (count($item) > 0) {
	                $item_vals = (array_values($item));
	                $tables[] = $item_vals[0];
	            }
	        }
	    }

	    $data = [];
	    $dataData = [];
	    foreach ($tables as $key => $value) {
	    	$data[] = str_ireplace("CREATE TABLE ", "CREATE TABLE IF NOT EXISTS ",$this->dbShowTables($value));
	    	$dataData[] = $this->dbExtractContents($value, $full);
	    }
	   

	    
	    files()->put($files,implode($data,"\n"));
	    files()->put(str_replace('.sql','-data.sql',$files),implode($dataData,"\n"));
	    return;
	}
    
    function save($paths=""){
    	if(!$paths){
    		if(!files()->isDirectory(base_path("contents/backups"))){
				files()->makeDirectory(base_path("contents/backups"), 0775, true);
			}
    		$paths = base_path("contents/backups/backups-".date("d-m-y-h-i").".sql");
    	}
    	$this->dbBackups($paths);
    }

    function saveOutput($paths=""){
    	if($paths){
    		if(!files()->isDirectory($paths)){
				files()->makeDirectory($paths, 0775, true);
			}
    		$paths = $paths."/database.sql";
    	}
    	$this->dbBackups($paths,false);
    }

    


    function remove_sql_remarks($sql)
    {
	        $lines = explode("\n", $sql);
	        $sql = "";
	        $linecount = count($lines);
	        $output = "";
	        for ($i = 0; $i < $linecount; $i++) {
	            if (($i != ($linecount - 1)) || (strlen($lines[$i]) > 0)) {
	                if (isset($lines[$i][0]) && $lines[$i][0] != "#") {
	                    $output .= $lines[$i] . "\n";
	                } else {
	                    $output .= "\n";
	                }
	                $lines[$i] = "";
	            }
	        }
	        return $output;
	    }

	function remove_comments_from_sql_string($output)
	    {
	        $lines = explode("\n", $output);
	        $output = "";
	        $linecount = count($lines);
	        $in_comment = false;
	        for ($i = 0; $i < $linecount; $i++) {
	            if (preg_match("/^\/\*/", preg_quote($lines[$i]))) {
	                $in_comment = true;
	            }
	            if (!$in_comment) {
	                $output .= $lines[$i] . "\n";
	            }
	            if (preg_match("/\*\/$/", preg_quote($lines[$i]))) {
	                $in_comment = false;
	            }
	        }
	        unset($lines);
	        return $output;
	    }


	function split_sql_file($sql, $delimiter)
	    {
	        // Split up our string into "possible" SQL statements.
	        $tokens = explode($delimiter, $sql);
	        // try to save mem.
	        $sql = "";
	        $output = array();
	        // we don't actually care about the matches preg gives us.
	        $matches = array();
	        // this is faster than calling count($oktens) every time thru the loop.
	        $token_count = count($tokens);
	        for ($i = 0; $i < $token_count; $i++) {
	            // Don't wanna add an empty string as the last thing in the array.
	            if (($i != ($token_count - 1)) || (strlen($tokens[$i] > 0))) {
	                // This is the total number of single quotes in the token.
	                $total_quotes = preg_match_all("/'/", $tokens[$i], $matches);
	                // Counts single quotes that are preceded by an odd number of backslashes,
	                // which means they're escaped quotes.
	                $escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$i], $matches);
	                $unescaped_quotes = $total_quotes - $escaped_quotes;
	                // If the number of unescaped quotes is even, then the delimiter did NOT occur inside a string literal.
	                if (($unescaped_quotes % 2) == 0) {
	                    // It's a complete sql statement.
	                    $output[] = $tokens[$i];
	                    // save memory.
	                    $tokens[$i] = "";
	                } else {
	                    // incomplete sql statement. keep adding tokens until we have a complete one.
	                    // $temp will hold what we have so far.
	                    $temp = $tokens[$i] . $delimiter;
	                    // save memory..
	                    $tokens[$i] = "";
	                    // Do we have a complete statement yet?
	                    $complete_stmt = false;
	                    for ($j = $i + 1; (!$complete_stmt && ($j < $token_count)); $j++) { 
	                        // This is the total number of single quotes in the token.
	                        $total_quotes = preg_match_all("/'/", $tokens[$j], $matches);
	                        // Counts single quotes that are preceded by an odd number of backslashes,
	                        // which means they're escaped quotes.
	                        $escaped_quotes = preg_match_all("/(?<!\\\\)(\\\\\\\\)*\\\\'/", $tokens[$j], $matches);

	                        $unescaped_quotes = $total_quotes - $escaped_quotes;

	                        if (($unescaped_quotes % 2) == 1) {
	                            // odd number of unescaped quotes. In combination with the previous incomplete
	                            // statement(s), we now have a complete statement. (2 odds always make an even)
	                            $output[] = $temp . $tokens[$j];

	                            // save memory.
	                            $tokens[$j] = "";
	                            $temp = "";

	                            // exit the loop.
	                            $complete_stmt = true;
	                            // make sure the outer loop continues at the right point.
	                            $i = $j;
	                        } else {
	                            // even number of unescaped quotes. We still don't have a complete statement.
	                            // (1 odd and 1 even always make an odd)
	                            $temp .= $tokens[$j] . $delimiter;
	                            // save memory.
	                            $tokens[$j] = "";
	                        }
	                    } // for..
	                } // else
	            }
	        }
	        $output = preg_replace('/\x{EF}\x{BB}\x{BF}/', '', $output);
	        return $output;
	    }



	

	function getDbField($table){
		return \DB::connection()->getSchemaBuilder()->getColumnListing($table);
	}

	function dbExtractContents($tables, $full=true){
		$fields = $this->getDbField($tables);
		
		$columns_q = '';
		$columns_temp = [];
		foreach ($fields as $key => $value) {
			$columns_temp[] = '`'.$value.'`';
		}
		
		$columns_q = implode(', ', $columns_temp);
	    $columns_q = "(" . $columns_q . ")";


	    
	    $data2 = \DB::table($tables);
	    
	    if(in_array("stores_id", $fields) && !$full){
	    	$data2 = $data2->where("stores_id", config("site.stores_id"));
		}
		$data = $data2->get();

	    $return = "";
	    $i = 0;
	    $count = 1;
	    if($data){
	    	 $count = count($data);
	    }
		foreach ($data as $key => $value) {
		 	$dataR = [];
		 	foreach ($fields as $keyF => $valueF) {
				//if(isset($value->{$valueF})){
		 		
					$value->{$valueF} = str_replace("'", "&rsquo;", $value->{$valueF});
					$dataR[] = "'" . ($valueF == "stores_id" ? "{stores_id}" : $value->{$valueF}) . "'";
				//}
				
			}

			if($key%5 == 0){
				$return .= 'INSERT INTO `' . $tables . '` ' . $columns_q . ' VALUES (';
			}
			$return .= implode(', ', $dataR);

			if(($key+1)%5 == 0 && $key > 0){
				$return .= ");\n\n\n";
			}else{
				if($count > ($key+1)){
					$return .= "),\n(";
				}else{
					
					$return .= ");";
				}
				
			}
			
			$i++;
		}
		
		return $return;
	}

	function dbShowTables($full_table_name){
		$qs = 'SHOW CREATE TABLE ' . $full_table_name;
	    $sql = \DB::select($qs);
	    if (isset($sql[0])) {
	        $sql[0] = (array)$sql[0];
	        $row = array_values($sql[0]);
	        if (isset($row[1])) {
	            return $row[1].';';
	        }

	    }
	}
    


    /*
	Clear all data indatabase
    */

    function truncate($tables = false){
    	if(!$tables){
    		$result = \DB::select('SHOW TABLES');
		    if (!empty($result)) {
		        foreach ($result as $item) {
		            $item = (array)$item;
		            if (count($item) > 0) {
		                $item_vals = (array_values($item));
		                if(defined("MUTISITE")){
		                	$fields = $this->getDbField($item_vals[0]);
		
							$validateStore = false;
							foreach ($fields as $key => $value) {
								if($value == "stores_id"){
									$validateStore = true;
								}
								
							}
							if($validateStore){
		                		\DB::table($item_vals[0])->where("stores_id", config("site.stores_id",0))->delete();
		                	}

		                }else{
		                	\DB::table($item_vals[0])->truncate();
		                }
		                
		            }
		        }
		    }
    	}else{
    		if (\Schema::hasTable($tables))
			{
    		 	\DB::table($tables)->truncate();
    		}
    	}
    }
}

?>