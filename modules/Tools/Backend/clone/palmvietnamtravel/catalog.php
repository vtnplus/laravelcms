<?php

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","2b5d6dc7d64cceb09f8d2d9bfd5517ae");
            if($data){
                $data->title = 'Điện thoại & Máy tính bảng';
                
                $data->seo_urls = str_slug("Điện thoại & Máy tính bảng").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Điện thoại & Máy tính bảng',
                    "keyword"	=> '2b5d6dc7d64cceb09f8d2d9bfd5517ae',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Điện thoại & Máy tính bảng").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","f1501d247a790dc9ff5ac31ae525de22");
            if($data){
                $data->title = 'Điện thoại';
                
                $data->seo_urls = str_slug("Điện thoại").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Điện thoại',
                    "keyword"	=> 'f1501d247a790dc9ff5ac31ae525de22',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Điện thoại").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","96f62acd355249fba16254f4ff13da46");
            if($data){
                $data->title = 'Máy tính bảng';
                
                $data->seo_urls = str_slug("Máy tính bảng").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy tính bảng',
                    "keyword"	=> '96f62acd355249fba16254f4ff13da46',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy tính bảng").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","3b4b514404ef3a7173c1716000c8abf1");
            if($data){
                $data->title = 'Phụ kiện & Sim thẻ cào';
                
                $data->seo_urls = str_slug("Phụ kiện & Sim thẻ cào").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Phụ kiện & Sim thẻ cào',
                    "keyword"	=> '3b4b514404ef3a7173c1716000c8abf1',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Phụ kiện & Sim thẻ cào").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","24d79ac5afa7ffe344e70ae7d00a2223");
            if($data){
                $data->title = 'Pin sạc dự phòng';
                
                $data->seo_urls = str_slug("Pin sạc dự phòng").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Pin sạc dự phòng',
                    "keyword"	=> '24d79ac5afa7ffe344e70ae7d00a2223',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Pin sạc dự phòng").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","42e4e22000aed8f08fd40fc379bca678");
            if($data){
                $data->title = 'Ốp lưng & Bao da điện thoại';
                
                $data->seo_urls = str_slug("Ốp lưng & Bao da điện thoại").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Ốp lưng & Bao da điện thoại',
                    "keyword"	=> '42e4e22000aed8f08fd40fc379bca678',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Ốp lưng & Bao da điện thoại").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","3960ddca2bbcdec390fc8df81c3af255");
            if($data){
                $data->title = 'Phụ kiện Máy tính bảng';
                
                $data->seo_urls = str_slug("Phụ kiện Máy tính bảng").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Phụ kiện Máy tính bảng',
                    "keyword"	=> '3960ddca2bbcdec390fc8df81c3af255',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Phụ kiện Máy tính bảng").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","624c277a613cc732345eefd7ed5ed9af");
            if($data){
                $data->title = 'Miếng dán kính cường lực & màn hình điện thoại';
                
                $data->seo_urls = str_slug("Miếng dán kính cường lực & màn hình điện thoại").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Miếng dán kính cường lực & màn hình điện thoại',
                    "keyword"	=> '624c277a613cc732345eefd7ed5ed9af',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Miếng dán kính cường lực & màn hình điện thoại").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","4cb3005773ea37a0df47d2e915bf4908");
            if($data){
                $data->title = 'Pin & Bộ sạc';
                
                $data->seo_urls = str_slug("Pin & Bộ sạc").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Pin & Bộ sạc',
                    "keyword"	=> '4cb3005773ea37a0df47d2e915bf4908',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Pin & Bộ sạc").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","43a4e3b65a564abd4305af8a9a01e51c");
            if($data){
                $data->title = 'Cáp & Dock sạc';
                
                $data->seo_urls = str_slug("Cáp & Dock sạc").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Cáp & Dock sạc',
                    "keyword"	=> '43a4e3b65a564abd4305af8a9a01e51c',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Cáp & Dock sạc").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","9bb5b995aa32afe1c99b1b9f00b21289");
            if($data){
                $data->title = 'Phụ kiện di động trên xe hơi';
                
                $data->seo_urls = str_slug("Phụ kiện di động trên xe hơi").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Phụ kiện di động trên xe hơi',
                    "keyword"	=> '9bb5b995aa32afe1c99b1b9f00b21289',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Phụ kiện di động trên xe hơi").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","e7d0ac482c351d066205d25cf580e496");
            if($data){
                $data->title = 'Phụ kiện khác';
                
                $data->seo_urls = str_slug("Phụ kiện khác").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Phụ kiện khác',
                    "keyword"	=> 'e7d0ac482c351d066205d25cf580e496',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Phụ kiện khác").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","d648792f5c6bb427688fb19a8d895069");
            if($data){
                $data->title = 'Phụ kiện camera điện thoại';
                
                $data->seo_urls = str_slug("Phụ kiện camera điện thoại").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Phụ kiện camera điện thoại',
                    "keyword"	=> 'd648792f5c6bb427688fb19a8d895069',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Phụ kiện camera điện thoại").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","7fcafc339fcce2be6229b749ee489c31");
            if($data){
                $data->title = 'Máy tính & Laptop';
                
                $data->seo_urls = str_slug("Máy tính & Laptop").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy tính & Laptop',
                    "keyword"	=> '7fcafc339fcce2be6229b749ee489c31',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy tính & Laptop").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","59213a403779f9e7684d71e12bd0b661");
            if($data){
                $data->title = 'Máy tính để bàn';
                
                $data->seo_urls = str_slug("Máy tính để bàn").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy tính để bàn',
                    "keyword"	=> '59213a403779f9e7684d71e12bd0b661',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy tính để bàn").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","146bdebb324a64d327b1dde22a07d0bd");
            if($data){
                $data->title = 'Laptop';
                
                $data->seo_urls = str_slug("Laptop").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Laptop',
                    "keyword"	=> '146bdebb324a64d327b1dde22a07d0bd',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Laptop").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","86c12cd177a3ce5493363820389ec724");
            if($data){
                $data->title = 'Macbook';
                
                $data->seo_urls = str_slug("Macbook").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Macbook',
                    "keyword"	=> '86c12cd177a3ce5493363820389ec724',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Macbook").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","da6781eb53105c223835e561765d396c");
            if($data){
                $data->title = 'Dòng 2-in-1s';
                
                $data->seo_urls = str_slug("Dòng 2-in-1s").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Dòng 2-in-1s',
                    "keyword"	=> 'da6781eb53105c223835e561765d396c',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Dòng 2-in-1s").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","9c99e4aa2081ebffa3f5aadd326c4642");
            if($data){
                $data->title = 'Laptop cơ bản';
                
                $data->seo_urls = str_slug("Laptop cơ bản").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Laptop cơ bản',
                    "keyword"	=> '9c99e4aa2081ebffa3f5aadd326c4642',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Laptop cơ bản").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","ebdb5b44ec472fad4d8964f54e182603");
            if($data){
                $data->title = 'Dòng giải trí';
                
                $data->seo_urls = str_slug("Dòng giải trí").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Dòng giải trí',
                    "keyword"	=> 'ebdb5b44ec472fad4d8964f54e182603',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Dòng giải trí").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","60971930876193d47cb3d0ac97782cda");
            if($data){
                $data->title = 'Phụ kiện máy tính';
                
                $data->seo_urls = str_slug("Phụ kiện máy tính").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Phụ kiện máy tính',
                    "keyword"	=> '60971930876193d47cb3d0ac97782cda',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Phụ kiện máy tính").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","bf815a63f1f5e6e58375e5e3c2fdf269");
            if($data){
                $data->title = 'Thiết bị lưu trữ';
                
                $data->seo_urls = str_slug("Thiết bị lưu trữ").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị lưu trữ',
                    "keyword"	=> 'bf815a63f1f5e6e58375e5e3c2fdf269',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị lưu trữ").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","473406016d2637a98d1ef28cd3489ff9");
            if($data){
                $data->title = 'Chuột';
                
                $data->seo_urls = str_slug("Chuột").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Chuột',
                    "keyword"	=> '473406016d2637a98d1ef28cd3489ff9',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Chuột").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","3c1f9f1f14aa4446e32809a33dc303bf");
            if($data){
                $data->title = 'Phụ kiện Macbook';
                
                $data->seo_urls = str_slug("Phụ kiện Macbook").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Phụ kiện Macbook',
                    "keyword"	=> '3c1f9f1f14aa4446e32809a33dc303bf',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Phụ kiện Macbook").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","900c7839f800d89e1110fbfd0af31130");
            if($data){
                $data->title = 'Máy in & Phụ kiện';
                
                $data->seo_urls = str_slug("Máy in & Phụ kiện").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy in & Phụ kiện',
                    "keyword"	=> '900c7839f800d89e1110fbfd0af31130',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy in & Phụ kiện").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","26dc44f546571b306f1516db4418bc27");
            if($data){
                $data->title = 'Thiết bị mạng';
                
                $data->seo_urls = str_slug("Thiết bị mạng").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị mạng',
                    "keyword"	=> '26dc44f546571b306f1516db4418bc27',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị mạng").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","60b1c60ba0361653d0892f7b33880f10");
            if($data){
                $data->title = 'Linh kiện máy tính';
                
                $data->seo_urls = str_slug("Linh kiện máy tính").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Linh kiện máy tính',
                    "keyword"	=> '60b1c60ba0361653d0892f7b33880f10',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Linh kiện máy tính").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","59faf260f90dd1a0b9867e631978b3dd");
            if($data){
                $data->title = 'Máy ảnh & Máy quay phim';
                
                $data->seo_urls = str_slug("Máy ảnh & Máy quay phim").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy ảnh & Máy quay phim',
                    "keyword"	=> '59faf260f90dd1a0b9867e631978b3dd',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy ảnh & Máy quay phim").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","bb36b7bcd38c29985347afec936440bb");
            if($data){
                $data->title = 'Máy quay phim & Máy quay hành động';
                
                $data->seo_urls = str_slug("Máy quay phim & Máy quay hành động").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy quay phim & Máy quay hành động',
                    "keyword"	=> 'bb36b7bcd38c29985347afec936440bb',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy quay phim & Máy quay hành động").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","00dd8c51cd0ae1f2c4609bb52e27c229");
            if($data){
                $data->title = 'Máy ảnh bỏ túi & Máy chụp ảnh dưới nước';
                
                $data->seo_urls = str_slug("Máy ảnh bỏ túi & Máy chụp ảnh dưới nước").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy ảnh bỏ túi & Máy chụp ảnh dưới nước',
                    "keyword"	=> '00dd8c51cd0ae1f2c4609bb52e27c229',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy ảnh bỏ túi & Máy chụp ảnh dưới nước").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","1b0b3fe2ecb4c0d8ee26bfbd5f56ec0f");
            if($data){
                $data->title = 'Máy ảnh DSLR';
                
                $data->seo_urls = str_slug("Máy ảnh DSLR").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy ảnh DSLR',
                    "keyword"	=> '1b0b3fe2ecb4c0d8ee26bfbd5f56ec0f',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy ảnh DSLR").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","fb16419f4b00c735cf5237897b11ec6a");
            if($data){
                $data->title = 'Máy ảnh không gương lật';
                
                $data->seo_urls = str_slug("Máy ảnh không gương lật").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy ảnh không gương lật',
                    "keyword"	=> 'fb16419f4b00c735cf5237897b11ec6a',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy ảnh không gương lật").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","4fe743be012754f22bad986e84b22607");
            if($data){
                $data->title = 'Máy ảnh siêu zoom';
                
                $data->seo_urls = str_slug("Máy ảnh siêu zoom").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy ảnh siêu zoom',
                    "keyword"	=> '4fe743be012754f22bad986e84b22607',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy ảnh siêu zoom").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","e6d6dea8a9bc727b77d2711d7ec6eab3");
            if($data){
                $data->title = 'Các loại máy ảnh khác & Phụ kiện';
                
                $data->seo_urls = str_slug("Các loại máy ảnh khác & Phụ kiện").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Các loại máy ảnh khác & Phụ kiện',
                    "keyword"	=> 'e6d6dea8a9bc727b77d2711d7ec6eab3',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Các loại máy ảnh khác & Phụ kiện").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","894c10de6095708e9e7b945049723b20");
            if($data){
                $data->title = 'Máy ảnh chụp lấy ngay';
                
                $data->seo_urls = str_slug("Máy ảnh chụp lấy ngay").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy ảnh chụp lấy ngay',
                    "keyword"	=> '894c10de6095708e9e7b945049723b20',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy ảnh chụp lấy ngay").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","a6112c72895159b5e8427f84ddb08677");
            if($data){
                $data->title = 'Camera xe hơi';
                
                $data->seo_urls = str_slug("Camera xe hơi").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Camera xe hơi',
                    "keyword"	=> 'a6112c72895159b5e8427f84ddb08677',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Camera xe hơi").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","9a7f5d5c1021c9f787a37467c145ca8a");
            if($data){
                $data->title = 'Phụ kiện máy ảnh';
                
                $data->seo_urls = str_slug("Phụ kiện máy ảnh").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Phụ kiện máy ảnh',
                    "keyword"	=> '9a7f5d5c1021c9f787a37467c145ca8a',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Phụ kiện máy ảnh").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","fff0dd0c44cf6204dfae339ef1fee4b5");
            if($data){
                $data->title = 'Thẻ nhớ';
                
                $data->seo_urls = str_slug("Thẻ nhớ").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thẻ nhớ',
                    "keyword"	=> 'fff0dd0c44cf6204dfae339ef1fee4b5',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thẻ nhớ").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","77f6f70f06bf286aba981edec25a1a23");
            if($data){
                $data->title = 'Chân máy ảnh & Gậy tự sướng';
                
                $data->seo_urls = str_slug("Chân máy ảnh & Gậy tự sướng").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Chân máy ảnh & Gậy tự sướng',
                    "keyword"	=> '77f6f70f06bf286aba981edec25a1a23',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Chân máy ảnh & Gậy tự sướng").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","bd51b10525294acc87de87f4f2bcf0cd");
            if($data){
                $data->title = 'Túi đựng máy ảnh';
                
                $data->seo_urls = str_slug("Túi đựng máy ảnh").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Túi đựng máy ảnh',
                    "keyword"	=> 'bd51b10525294acc87de87f4f2bcf0cd',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Túi đựng máy ảnh").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","63994c9db4c16a6e993de12715a96fc7");
            if($data){
                $data->title = 'Ống nhòm';
                
                $data->seo_urls = str_slug("Ống nhòm").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Ống nhòm',
                    "keyword"	=> '63994c9db4c16a6e993de12715a96fc7',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Ống nhòm").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","4d8aa0aa80a20be6f1996d74035a9a4c");
            if($data){
                $data->title = 'Ống kính';
                
                $data->seo_urls = str_slug("Ống kính").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Ống kính',
                    "keyword"	=> '4d8aa0aa80a20be6f1996d74035a9a4c',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Ống kính").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","28d80e7e3e40bd7101f79d40a367a8c9");
            if($data){
                $data->title = 'TV, Video, Âm thanh, Game & Thiết bị số';
                
                $data->seo_urls = str_slug("TV, Video, Âm thanh, Game & Thiết bị số").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'TV, Video, Âm thanh, Game & Thiết bị số',
                    "keyword"	=> '28d80e7e3e40bd7101f79d40a367a8c9',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("TV, Video, Âm thanh, Game & Thiết bị số").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","6521602f22ff2a77c04b4100d6a5e52c");
            if($data){
                $data->title = 'Tivi';
                
                $data->seo_urls = str_slug("Tivi").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Tivi',
                    "keyword"	=> '6521602f22ff2a77c04b4100d6a5e52c',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Tivi").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","7e4f14a65fe054b89942b99389c06dba");
            if($data){
                $data->title = 'Dưới 24 inches';
                
                $data->seo_urls = str_slug("Dưới 24 inches").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Dưới 24 inches',
                    "keyword"	=> '7e4f14a65fe054b89942b99389c06dba',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Dưới 24 inches").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","7509c049c2180ea3b626e83a54747e1a");
            if($data){
                $data->title = '25 - 32 inches';
                
                $data->seo_urls = str_slug("25 - 32 inches").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  '25 - 32 inches',
                    "keyword"	=> '7509c049c2180ea3b626e83a54747e1a',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("25 - 32 inches").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","ff8adf33463ad85d2f37a0bdd39f13d0");
            if($data){
                $data->title = '33 - 42 Inches';
                
                $data->seo_urls = str_slug("33 - 42 Inches").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  '33 - 42 Inches',
                    "keyword"	=> 'ff8adf33463ad85d2f37a0bdd39f13d0',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("33 - 42 Inches").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","0a1ce707a5ecc2047704503cf4af4ad0");
            if($data){
                $data->title = '43 - 54 Inches';
                
                $data->seo_urls = str_slug("43 - 54 Inches").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  '43 - 54 Inches',
                    "keyword"	=> '0a1ce707a5ecc2047704503cf4af4ad0',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("43 - 54 Inches").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","3eab76db5419f80ba8b3aef5396e363a");
            if($data){
                $data->title = 'trên 55 inches';
                
                $data->seo_urls = str_slug("trên 55 inches").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'trên 55 inches',
                    "keyword"	=> '3eab76db5419f80ba8b3aef5396e363a',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("trên 55 inches").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","5bb26e9a8bf56118aa5a24e8ca57cc19");
            if($data){
                $data->title = 'Phụ kiện Tivi';
                
                $data->seo_urls = str_slug("Phụ kiện Tivi").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Phụ kiện Tivi',
                    "keyword"	=> '5bb26e9a8bf56118aa5a24e8ca57cc19',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Phụ kiện Tivi").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","c19b28073e32016b87763ced38884e23");
            if($data){
                $data->title = 'Thiết bị âm thanh';
                
                $data->seo_urls = str_slug("Thiết bị âm thanh").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị âm thanh',
                    "keyword"	=> 'c19b28073e32016b87763ced38884e23',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị âm thanh").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","31e7163acb2c4750cdb05454a8c771f0");
            if($data){
                $data->title = 'Các loại tai nghe';
                
                $data->seo_urls = str_slug("Các loại tai nghe").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Các loại tai nghe',
                    "keyword"	=> '31e7163acb2c4750cdb05454a8c771f0',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Các loại tai nghe").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","a56a1395c81179b47e467439d9517917");
            if($data){
                $data->title = 'Loa di động';
                
                $data->seo_urls = str_slug("Loa di động").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Loa di động',
                    "keyword"	=> 'a56a1395c81179b47e467439d9517917',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Loa di động").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","cb6d2fa0a74b4fd9d799923b20475cf9");
            if($data){
                $data->title = 'Dàn âm thanh giải trí';
                
                $data->seo_urls = str_slug("Dàn âm thanh giải trí").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Dàn âm thanh giải trí',
                    "keyword"	=> 'cb6d2fa0a74b4fd9d799923b20475cf9',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Dàn âm thanh giải trí").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","b98082cdbe59220a68d72475c6fdb352");
            if($data){
                $data->title = 'Máy nghe nhạc';
                
                $data->seo_urls = str_slug("Máy nghe nhạc").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Máy nghe nhạc',
                    "keyword"	=> 'b98082cdbe59220a68d72475c6fdb352',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Máy nghe nhạc").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","34e2d1989a1dbf75cd631596133ee5ee");
            if($data){
                $data->title = 'Video';
                
                $data->seo_urls = str_slug("Video").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Video',
                    "keyword"	=> '34e2d1989a1dbf75cd631596133ee5ee',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Video").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","a8bcec16072f29e959ef732f721764b4");
            if($data){
                $data->title = 'Thiết bị trình chiếu';
                
                $data->seo_urls = str_slug("Thiết bị trình chiếu").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị trình chiếu',
                    "keyword"	=> 'a8bcec16072f29e959ef732f721764b4',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị trình chiếu").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","fcec5a34103b07264dad0fb95418562d");
            if($data){
                $data->title = 'Thiết bị Streaming';
                
                $data->seo_urls = str_slug("Thiết bị Streaming").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị Streaming',
                    "keyword"	=> 'fcec5a34103b07264dad0fb95418562d',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị Streaming").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","86f7816cab54f489c639ebac0d21e94e");
            if($data){
                $data->title = 'Thiết bị chơi game';
                
                $data->seo_urls = str_slug("Thiết bị chơi game").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị chơi game',
                    "keyword"	=> '86f7816cab54f489c639ebac0d21e94e',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị chơi game").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","183709ebe3a1d675014d32b94ad7ed94");
            if($data){
                $data->title = 'Xbox';
                
                $data->seo_urls = str_slug("Xbox").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Xbox',
                    "keyword"	=> '183709ebe3a1d675014d32b94ad7ed94',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Xbox").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","ab7048c58ea2afa826c06bf8d756e8d1");
            if($data){
                $data->title = 'Playstation';
                
                $data->seo_urls = str_slug("Playstation").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Playstation',
                    "keyword"	=> 'ab7048c58ea2afa826c06bf8d756e8d1',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Playstation").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","073b7e4ff1d153a52b07eadb5898cb92");
            if($data){
                $data->title = 'Nintendo';
                
                $data->seo_urls = str_slug("Nintendo").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Nintendo',
                    "keyword"	=> '073b7e4ff1d153a52b07eadb5898cb92',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Nintendo").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","b51bba6c3a421fdd2a90d1b29e9e8b82");
            if($data){
                $data->title = 'Thiết bị đeo công nghệ';
                
                $data->seo_urls = str_slug("Thiết bị đeo công nghệ").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị đeo công nghệ',
                    "keyword"	=> 'b51bba6c3a421fdd2a90d1b29e9e8b82',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị đeo công nghệ").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","95299660b26a730b7ad1c065538f2f64");
            if($data){
                $data->title = 'Đồng hồ thông minh';
                
                $data->seo_urls = str_slug("Đồng hồ thông minh").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Đồng hồ thông minh',
                    "keyword"	=> '95299660b26a730b7ad1c065538f2f64',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Đồng hồ thông minh").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","a5f48a78b3f1563884c9619b3b946619");
            if($data){
                $data->title = 'Thiết bị theo dõi sức khỏe & vận động';
                
                $data->seo_urls = str_slug("Thiết bị theo dõi sức khỏe & vận động").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị theo dõi sức khỏe & vận động',
                    "keyword"	=> 'a5f48a78b3f1563884c9619b3b946619',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị theo dõi sức khỏe & vận động").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","afa6ec5ab61e6204ad314450831f330c");
            if($data){
                $data->title = 'Mắt kính thông minh';
                
                $data->seo_urls = str_slug("Mắt kính thông minh").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Mắt kính thông minh',
                    "keyword"	=> 'afa6ec5ab61e6204ad314450831f330c',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Mắt kính thông minh").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","4f863fa2af250455efa69dd707a22b79");
            if($data){
                $data->title = 'Thiết bị giám sát thông minh';
                
                $data->seo_urls = str_slug("Thiết bị giám sát thông minh").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị giám sát thông minh',
                    "keyword"	=> '4f863fa2af250455efa69dd707a22b79',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị giám sát thông minh").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }

			$data = db("Catalog::Categories")->language()->stores()->auth()->where("keyword","b6006e9c603348a6e0978902d74b3f89");
            if($data){
                $data->title = 'Thiết bị điều khiển qua App';
                
                $data->seo_urls = str_slug("Thiết bị điều khiển qua App").".html",
                $data->save();
                
            }else{
            	db("Catalog::Categories")->insert([
                    "title" =>  'Thiết bị điều khiển qua App',
                    "keyword"	=> 'b6006e9c603348a6e0978902d74b3f89',
                    "type" => $type,
                    
                    "seo_urls" => str_slug("Thiết bị điều khiển qua App").".html",
                    "language"  => getLanguage(),
                    "stores_id" => getStores(),
                    "users_id"  => getAuth()
                ]);
            }
?>