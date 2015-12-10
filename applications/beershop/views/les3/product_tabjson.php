<?php
/* global site_url */

// +----------------------------------------------------------
// | Beershop
// +----------------------------------------------------------
// | KHK - 2 TI - 201x-201x
// +----------------------------------------------------------
// | Product/tabjson
// |
// +----------------------------------------------------------
// | M. Decabooter
// +----------------------------------------------------------
?>

<h4><?php echo $title; ?></h4>

<script type="text/javascript">

    var tab_counter = 0;
    var $tabs;
    var tab_title;
    var tab_content;
    $(function () {
        $("#terug").button();

        $tabs = $("#tabs").tabs({
            tabTemplate: "<li><a href='#{href}'>#{label}</a></li>"
        });

 
    });
    function removeTabs() {
        for (var i = tab_counter; i > 0; i--) {
            // inhoud verwijderen
            $("#tabs-" + i).remove();
            $('.bier').remove();
            $tabs.tabs("refresh");
        }

        tab_counter = 0;
    }

    function addTab(titel, inhoud) {
        tab_title = titel;
        tab_content = inhoud;
        tab_counter++;
        $("<li class='bier'><a href='#tabs-" + tab_counter + "'>" + tab_title + "</a></li>").appendTo($tabs.find("ul"));
        $("<div id='tabs-" + tab_counter + "'><p>" + tab_content + "</p></div>").appendTo($tabs);
        $tabs.tabs("refresh");
    }

    function addTabs(gekozenbrouwerij) {

 
    }


    $(document).ready(function () {

        $("#brouwerij").change(function () {
            removeTabs();
            addTabs($(this).val());
        });
    });

</script>

<?php
foreach ($brouwerijen as $brouwerij) {
    $options[$brouwerij->id] = $brouwerij->naam;
}
?>

<p>
    <?php echo anchor('home/index', 'Terug', 'id="terug"'); ?>
</p>

<div id="tabs">
    <ul>
        <li><a href="#tabs-0">Brouwerijen</a></li>
    </ul>
    <div id="tabs-0">
        <p>
            <?php echo form_dropdown('brouwerij', $options, '0', 'id="brouwerij" size="10" class="text ui-widget-content" style="width:250px"'); ?>
        </p>
    </div>
</div>

