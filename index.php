<!DOCTYPE html>
<html>
  <head>
    
  </head>
  <body>
    <?php
    if($_POST['url']) {
        $url = $_POST['url'];
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $random_string = '';
        for ($i = 0; $i < 8; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $random_string .= $characters[$index];
        }

        
        $file = 'urls.txt';
        $current = file_get_contents($file);
        $current .= $url."\n".$random_string."\n";
        file_put_contents($file, $current);

        ?>
        Your Shortened URL is: 
    <?php 
        $addr = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=".$random_string;
        echo '<a href="//'.$addr.'">'.$addr.'</a>';
        } elseif($_GET['id']) {

            $filename = 'urls.txt';
            $search_string = $_GET['id'];
            $handle = fopen($filename, 'r');
            $line_number = 0;
            while (($line = fgets($handle)) !== false) {
                $line_number++;
                if (strpos($line, $search_string) !== false) {
                    break;
                }
            }
            fclose($handle);
            $handle = fopen($filename, 'r');
            for ($i = 1; $i < $line_number-1; $i++) {
                fgets($handle);
            }
            $line_contents = fgets($handle);
            fclose($handle);
            header("Location: $line_contents");
            echo '<a href="'.$line_contents.'">'.$line_contents.'</a>';


        } else { ?>
    <form action="index.php" method="POST">
      <label for="url">Enter URL</label>
      <input type="url" id="url" name="url">
    </form>
    <?php } ?>
  </body>
</html>
