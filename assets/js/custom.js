    function result(){
        var barang = document.getElementById('barang_masuk').value;
        var produksi = 2;
        var hasil = parseInt(barang) * parseInt(produksi);
        if (!isNaN(hasil)) {
            document.getElementById('barang_jadi').value=hasil;
        }
    }

    function harga(){
        var harga_material = document.getElementById("barang").value;
        document.getElementById("harga").value = harga_material;
    }
    


