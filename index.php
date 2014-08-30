<?php
function files($path)
{
    $files = [];

    if (is_dir($path)) {
        $ignores = ['.', '..', '.DS_Store', 'index.php', 'Thumbs.db'];
        foreach (scandir($path) as $file) {
            if (in_array($file, $ignores)) continue;
            $files[] = $file;
        }
    }

    return $files;
}


$base_path = './';
$action    = $_GET['action'] ?: 'index';
$title     = $_GET['title']  ?: 'index';

switch ($action) {
    case 'view':
        $images = files("$base_path/$title");
        break;
    case 'index':
    default:
        $books = [];
        foreach (files($base_path) as $title) {
            $books[$title] = [
                'path'   => "$base_path/$title",
                'images' => files("$base_path/$title")
            ];
        }
        break;
}
header('Cache-Control: no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
?>
<!DOCTYPE html>
<head>
    <title><?= $_GET['title'] ?> <?= basename(dirname($_SERVER['SCRIPT_FILENAME'])) ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <style>
    img.cover { width: 200px; height: 300px; }
    img.page { width: auto; height: auto; }
    ul { width: 1000px; list-style: none; }
    li { margin: 20px; float: left; }
    </style>
</head>
<body class="container">
<ul>
<?php
if ($action == 'index') {
    foreach ($books as $title => $book) {
        $cover = "{$book['path']}/{$book['images'][0]}";
        $li  = '<li>';
        $li .=   '<a href="./?action=view&title=' . $title . '">';
        $li .=   '<img class="cover" title="' . $title . '" src="' . $cover .'">';
        $li .=   '</a>';
        $li .= '</li>' . PHP_EOL;
        echo $li;
    }
} else {
    foreach ($images as $image) {
        echo '<li><img class="page" src="' . "./$title/$image" . '"></li>';
    }
}
?>
</ul>
</body>
</html>
