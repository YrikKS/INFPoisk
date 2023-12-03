<?php
if (isset($_POST["site"])) {
    $site = $_POST["site"];
    header("Location: http://$site");
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title> lab</title>
    </head>

    <body>
        <?php
        print "<form action='{$_SERVER['PHP_SELF']}' method='post'>";
        ?>
        <?php
        $list_sites = array("www.yandex.ru", "www.rambler.ru", "www.google.com", "www.yahoo.com", "www.altavista.com");
        $arr_length = count($list_sites);

        print "<select name=\"site\">\n";
        print "\t<option value=\"\">Sistems</option>";

        $i = 0;
        while ($i < $arr_length) {
            $current_site = $list_sites[$i++];
            print "\t<option value=\"$current_site\">$current_site</option>";
        }
        print "</select>";
        ?>
        <input type="submit" value="submit">
        </form>

    <?php
}
    ?>
    </body>

    </html>