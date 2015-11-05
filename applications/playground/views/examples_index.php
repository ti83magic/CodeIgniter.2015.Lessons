<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Playground: examples</title>
        <?php echo link_tag('css/bootstrap.css'); ?>        
    </head>
    <body>

        <div>
            <h1>Examples</h1>
            <p>
                Below you'll find the links to several examples of functionality
                that I've made outside of the course. Usually born out of
                necessity, made to be used during the course or in the major
                project next semester. 
            </p>

            <p>
                <?php
                echo anchor('examples/table', 'Tables') . '<br>';
                echo anchor('examples/bootstrap', 'Bootstrap') . '<br>';
                ?>
            </p>

        </div>

    </body>
</html>