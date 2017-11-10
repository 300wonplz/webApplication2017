<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/labResources/music.css" type="text/css" rel="stylesheet" />

		<?php
			$song_count = 9892;
			$total_time = (int)($song_count/10);
			$news_pages = 5;
			$favo_artist = array("Guns N' Roses", "Green Day", "Blink182");
		?>
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			I love music.
			I have <?=$song_count?> total songs,
			which is over <?=$total_time?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Yahoo! Top Music News</h2>

			<ol>
				<?php
				if(!isset($_GET["newspages"])) {
				 				for($i = 1 ; $i <= $news_pages ; $i++){ ?>
									<li><a href="http://music.yahoo.com/news/archive/?page=<?= $i ?>">Page <?= $i ?></a></li>
				<?php }
			}else{
				 			for($i = 1 ; $i <= $_GET["newspages"] ; $i++){
				?>
								<li><a href="http://music.yahoo.com/news/archive/?page=<?= $i ?>">Page <?= $i ?></a></li>
				<?php }
					}
			?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php array_push($favo_artist, "Queen");
							$favo_artist = file("favorite.txt");
				 ?>
				<?php for($j = 0 ; $j<count($favo_artist); $j++){ ?>
								<li><a href="http://en.wikipedia.org/wiki/<?= $favo_artist[$j] ?>"><?= $favo_artist[$j] ?></a></li>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<?php
			$mp3 = glob("lab5/musicPHP/songs/*.mp3");

			function fsize_rsort($a, $b){
				if(filesize($a)==filesize($b)){
					return 0;
				}
				return (filesize($a)<filesize($b))?1:-1;
			}
			
			usort($mp3,"fsize_rsort");
		 ?>
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				foreach($mp3 as $mp3file){
					$filesize = (int)(filesize($mp3file)/1024);
					?>
					<li class="mp3item">
						<a href="<?= $mp3file ?>" download><?= basename($mp3file) ?> (<?=$filesize?> KB)</a>
					</li>
				<?php
				}
				 ?>
				<!-- <li class="mp3item">
					<a href="lab5/musicPHP/songs/paradise-city.mp3">paradise-city.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/basket-case.mp3">basket-case.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/all-the-small-things.mp3">all-the-small-things.mp3</a>
				</li> -->

				<!-- Exercise 8: Playlists (Files) -->
				<?php
				$m3u = glob("lab5/musicPHP/songs/*.m3u");
				rsort($m3u);
				foreach ($m3u as $filename) {
					$text = file($filename);
					shuffle($text);
					?>
					<li class="playlistitem"><?=basename($filename)?>:
						<ul>
					<?php
					foreach ($text as $value) {
						if(strpos($value, "EXT") == false){
					 ?>
					 	<li><?=$value?></li>
					 <?php
						}
					}
						?>
					</ul>
				</li>
				<?php
			}
				 ?>
			</ul>
		</div>

		<div>
			<a href="http://validator.w3.org/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img src="http://selab.hanyang.ac.kr/courses/cse326/2017/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
