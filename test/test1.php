dir_path = "folder/";
if(is_dir($dir_path))
{
    $files = scandir($dir_path);
    print_r($files);
    echo"<br>";
    for($i = 0; $i < count($files); $i++)
    {
        if($files[$i] != '.' && $files[$i] != '..')
        {
            echo "File $i -> $files[$i]<br>";
        }
    }
}
