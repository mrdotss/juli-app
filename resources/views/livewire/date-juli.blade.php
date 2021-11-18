<div>
    <?php
    
        // Show current date with Indonesia format
        use Carbon\Carbon; // for date
        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
        $hinichi = Carbon::now()->isoFormat('D MMMM Y');
        echo $hinichi;
        
    ?>
</div>
