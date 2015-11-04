<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <?php
    // +----------------------------------------------------------
    // | BMW - oefening
    // +----------------------------------------------------------
    // | KHK - 2 TI - 201x-201x
    // +----------------------------------------------------------
    // | Auto select
    // |
    // +----------------------------------------------------------
    // | K. Vangeel
    // +----------------------------------------------------------
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>

        <?php
        echo imgbmw("logos/autobanner.jpg");
        echo heading($title, 3);

        if (isset($boodschap)) {
            echo "<div>$boodschap</div>";
        }

        echo table_open(6);

        foreach ($autos as $auto) {
            if (count($auto->berichten) > 0) {
                echo table_row($auto->auto);

                foreach ($auto->berichten as $bericht) {
                    echo table_row_open();

                    echo table_data($bericht->datum);
                    echo table_data($bericht->naam);
                    echo table_data($bericht->straat);
                    echo table_data($bericht->plaats);
                    echo table_data($bericht->land);
                    echo table_data(anchor("admin/verwijder/$bericht->id", 'Verwijder'));

                    echo table_row_close();
                }
                echo table_row("<br>");
            }
        }

        echo table_close();
        ?>

        <div>
            <hr>
            <?php echo anchor("home/index", "Back"); ?>
        </div>


    </body>
</html>