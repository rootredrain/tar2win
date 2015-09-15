<?php
if (isset($_POST['filename'])) {
    $result = [];
    $filename = escapeshellarg($_POST['filename']);
    $cmd = "tar -c $filename /etc/passwd";
    exec($cmd, $result);
    $tar = implode($result);
    header('Content-Description: tar2win');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=tar2win.tar');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . strlen($tar));
    echo $tar;
    exit();
} else {
?>
<html>
    <head>
        <title>tar2win</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <h1>tar2win</h1></br>
        <p>输入你想打包的文件</p>
        <form action="/index.php" method="post">
            <input type="text" name="filename"></input>
            <input type="submit" name="submit"></input>
        </form></br>
    </body>
</html>
<?php } ?>