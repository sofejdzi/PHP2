
	<div class="fs_menu_overlay"></div>

<!-- Hamburger Menu -->


<div class="container contact_container">
    


    <!-- Contact Us -->

    <div class="row"> 
    <div class="col-lg-6 get_in_touch_col">      
    <form action="models/admin/unosProizvoda.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Kategorija</label>
                    <select class="form-control" name="ddlKat" id="ddlKat">
                        <option value="0">Izaberite</option>
                        <?php
                            $kategorije = dohvati_sve("kategorije");
                            foreach($kategorije as $kat):
                        ?>
                        <option value="<?=$kat->idKategorije?>"><?= $kat->naziv ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Naziv</label>
                    <input type="text" class="form-control" name="naslov">
                </div>
                <div class="form-group">
                    <label for="">Cena</label>
                    <input type="text" name="tekst" id="tekst" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Slika</label>
                    <input type="file" class="form-control" name="slika">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger" name="btnDodaj" id="btnDodaj">Dodaj</button>
                </div>
                
            </form>
            </div>
            <div class="col-lg-6 get_in_touch_col" id="formaUpdate">
            <form action="models/admin/editProizvoda.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Naziv</label>
                    <input type="text" class="form-control" name="naziv">
                </div>
                <div class="form-group">
                    <label for="">Cena</label>
                    <input type="text" name="cena" id="tekst" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-danger" name="btnIzmeni" id="btnIzmeni">Izmeni</button>
                </div>
                
            </form>
        </div>

    <div id="lampe">
            <?php
                $lampe = dohvati_sve_lampe();
                // var_dump($lampe);
                if(count($lampe) == 0){
                    echo "<p>Trenutno nema proizvoda.</p>";
                }
                else{
                    ?>
                    <table class="table">
                        <tr>
                            <th>RB</th>
                            <th>Slika</th>
                            <th>Naziv kategorije</th>
                            <th>Cena</th>
                            <th>Naziv</th>
                            <th></th><th></th>
                        </tr>
                <?php
                $rb=1;
                foreach($lampe as $l):
                    ?>
                    <tr>
                            <td><?=$rb++?></td>
                            <td ><img src="<?=$l->src?>" alt="<?=$l->alt?>"></td>
                            <td><?=$l->idKategorije?></td>
                            <td><?=$l->cena?></td>
                            <td><?=$l->naziv?></td>
                            <td><a href="#" class="lampaBrisanje" data-brisanje="<?= $l->idLampe ?>"><i class='fa fa-times-circle' style="font-size:24px"></i></a></td>
                             <td><a href="#" class="lampaEditovanje" data-editovanje="<?= $l->idLampe ?>"> <i class="fa fa-edit" style="font-size:24px"></i></a></td>
                        </tr>
                <?php endforeach;
                }
            ?>
            </table>
        </div>

    </div>
</div>

<script src="js/admin.js"></script>


