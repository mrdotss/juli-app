<div>
    <?php
        $con = mysqli_connect(env('DB_HOST','DB_USERNAME','DB_PASSWORD','DB_DATABASE'));
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        switch ($_GET['jenis']) {

            // Kabupaten / Kota
            case 'kota':
            $id_provinces = $_POST['id_provinces'];
            if($id_provinces == ''){
                exit;
            }else{
                $getcity = mysqli_query($con,"SELECT  * FROM regencies WHERE province_id ='$id_provinces' ORDER BY name ASC") or die ('Query Gagal');
                while($data = mysqli_fetch_array($getcity)){
                    echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
                }
                exit;    
            }
            break;

            // Kecamatan
            case 'kecamatan':
            $id_regencies = $_POST['id_regencies'];
            if($id_regencies == ''){
                exit;
            }else{
                $getcity = mysqli_query($con,"SELECT  * FROM districts WHERE regency_id ='$id_regencies' ORDER BY name ASC") or die ('Query Gagal');
                while($data = mysqli_fetch_array($getcity)){
                    echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
                }
                exit;    
            }
            break;
            
            // Kelurahan
            case 'kelurahan':
            $id_district = $_POST['id_district'];
            if($id_district == ''){
                exit;
            }else{
                $getcity = mysqli_query($con,"SELECT  * FROM villages WHERE district_id ='$id_district' ORDER BY name ASC") or die ('Query Gagal');
                while($data = mysqli_fetch_array($getcity)){
                    echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
                }
                exit;    
            }
            break;
            
        }
    ?>

     37836-B7E56-4BEA4-3C92N
</div>

<div class="form-group col-md-4">
    <label for="provinsi">Provinsi</label>
    <?php                    
        $sql_provinsi = mysqli_query($con,"SELECT * FROM provinces ORDER BY name ASC");
    ?>
    <select id="provinsi" name ="provinsi" class="form-control custom-select" required>
        <option disabled="disabled" selected="selected">Pilih...</option>
        <?php                       
            while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
            echo '<option value="'.$rs_provinsi['id'].'">'.$rs_provinsi['name'].'</option>';
            }                        
        ?>
    </select>
</div>