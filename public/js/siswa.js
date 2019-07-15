$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var alamat_kategori = 'api/kategori'
    var alamat_tag = 'api/tag'
    var alamat_artikel = 'api/artikel'

    // kategori
    // Get Data Siswa
    $.ajax({
        url: alamat_kategori,
        method: "GET",
        dataType: "json",
        success: function (berhasil) {
            // console.log(berhasil)
            $.each(berhasil.data, function (key, value) {
                
                
                $(".table-kategori").append(
                    `
                    <tr>
                                <td>${value.nama_kategori}</td>
                                <td>${value.slug}</td>
                                <td>
                                <button class="btn btn-danger btn-sm hapus-data" data-id="${value.id}">Hapus</button></td>
                    </tr>
                    `
                )
            })
        }
    })

    // <button class="btn btn-warning btn-sm edit-data" data-id="${value.id}">Edit</button>

    // Simpan Data
    $(".tombol-simpan").click(function (simpan) {
        simpan.preventDefault();
        var variable_isian_nama = $("input[name=nama_kategori]").val()
        // console.log(nama)
        $.ajax({
            url: alamat_kategori,
            method: "POST",
            dataType: "json",
            data: {
                nama_kategori: variable_isian_nama
            },
            success: function (berhasil) {
                alert(berhasil.message)
                location.reload();
            },
            error: function (gagal) {
                console.log(gagal)
            }
        })
    })

    // Hapus Data
    $(".table-kategori").on('click', '.hapus-data', function () {
        var id = $(this).data("id");
        // alert(id)
        $.ajax({
            url: alamat_kategori + "/" + id,
            method: "DELETE",
            dataType: "json",
            data: {
                id: id
            },
            success: function (berhasil) {
                alert(berhasil.message)
                location.reload();
            },
            error: function (gagal) {
                console.log(gagal)
            }
        })
    })

// ------------------------------------------------------------

// TAG

$.ajax({
    url: alamat_tag,
    method: "GET",
    dataType: "json",
    success: function (berhasil) {
        // console.log(berhasil)
        $.each(berhasil.data, function (key, value) {
            
            
            $("#table-tag").append(
                `
                <tr>
                            <td>${value.nama_tag}</td>
                            <td>${value.slug}</td>
                            <td>
                            
                            <button class="btn btn-danger btn-sm hapus-data-tag" data-id="${value.id}">Hapus</button></td>
                </tr>
                `
            )
        })
    }
})

{/* <button class="btn btn-warning btn-sm edit" onclick="document.getElementById('id02').style.display='block'" 
                            id="edit" data-id="${value.id}"
                            data-nama="${value.nama_tag}"
                            >Edit</button> */}

// EDIT FORM
$(document).on('click', '#edit', function () {
    var id = $(this).data("id");
    var nama_tag = $(this).data("nama");
                $("#id").val(id),
                $("#nama_tag").val(nama_tag)
 });  

 // EDIT DATA
 $('#tombol-edit-tag').submit(function(e){
    var formData    = new FormData($('#edit')[0]);
    var id = formData.get('id');
    e.preventDefault();
    $.ajax({
        url: "/api/tag/"+id,
        type:'POST',
        data:formData,
        cache: true,
        contentType: false,
        processData: false,
        async:false,
        dataType: 'json',
        success:function(result){
            alert(result.message)
            location.reload();
        },
    })
})

// Simpan Data
$(".tombol-simpan-tag").click(function (simpan) {
    simpan.preventDefault();
    var variable_isian_nama = $("input[name=nama_tag]").val()
    // console.log(nama)
    $.ajax({
        url: alamat_tag,
        method: "POST",
        dataType: "json",
        data: {
            nama_tag: variable_isian_nama
        },
        success: function (berhasil) {
            alert(berhasil.message)
            location.reload();
        },
        error: function (gagal) {
            console.log(gagal)
        }
    })
})

// Hapus Data
$("#table-tag").on('click', '.hapus-data-tag', function () {
    var id = $(this).data("id");
    // alert(id)
    $.ajax({
        url: alamat_tag + "/" + id,
        method: "DELETE",
        dataType: "json",
        data: {
            id: id
        },
        success: function (berhasil) {
            alert(berhasil.message)
            location.reload();
        },
        error: function (gagal) {
            console.log(gagal)
        }
    })
})



// -----------------------------------------------------------------------------

// ARTIKEL

$.ajax({
    url: alamat_artikel,
    method: "GET",
    dataType: "json",
    
    success: function (berhasil) {
        // console.log(berhasil)
       
        idnya = document.getElementById('id_kategori');
        $.each(berhasil.data, function (key, value) {
            
            $(".table-artikel").append(
                `
                <tr>
                            <td>${value.judul}</td>
                            <td>${value.slug}</td>
                            <td>${value.kategori.nama_kategori}</td>
                            <td>${value.tag[0].nama_tag}</td>
                            <td>${value.user.name}</td>
                            <td><img src="../assets/img/artikel/${value.foto}"
                            style="width:250px; height:250px;" alt="Foto"></td>
                            <td>
                            <button class="btn btn-danger btn-sm hapus-data-artikel" data-id="${value.id}">Hapus</button></td>
                </tr>
                `               
            )
            
        }) 
    }
})
// isi dari select Tag 
$.ajax({
    url: alamat_tag,
    method: "GET",
    dataType: "json",
    
    success: function (berhasil) {
        // console.log(berhasil)
        $.each(berhasil.data, function (key, value) {
            $(".isi-tag").append(
                `
                <option value="${value.id}">
                    ${value.nama_tag}
                </option>        
                `
            )
        }) 
    }
}) 

// isi dari select Kategori 
$.ajax({
    url: alamat_kategori,
    method: "GET",
    dataType: "json",
    
    success: function (berhasil) {
        // console.log(berhasil)
        $.each(berhasil.data, function (key, value) {
            $(".isi-kategori").append(
                `
                <option value="${value.id}">
                    ${value.nama_kategori}
                </option>        
                `
            )
        }) 
    }
}) 



// SIMPAN DATA
// $(".tombol-simpan-artikel").click(function (simpan) {
//     var formData    = new FormData($('#createData')[0]);
//     simpan.preventDefault();
//     // console.log(nama)
//     $.ajax({
//         url: alamat_artikel,
//         type:'POST',
//             data:formData,
//             cache: true,
//             contentType: false,
//             processData: false,
//             async:false,
//             dataType: 'json',
//         success: function (berhasil) {
//             alert(berhasil.message)
//             location.reload();
//         },
//         error: function (gagal) {
//             console.log(gagal)
//         }
//     })
// })

// Hapus Data
$(".table-artikel").on('click', '.hapus-data-artikel', function () {
    var id = $(this).data("id");
    // alert(id)
    $.ajax({
        url: alamat_artikel + "/" + id,
        method: "DELETE",
        dataType: "json",
        data: {
            id: id
        },
        success: function (berhasil) {
            alert(berhasil.message)
            location.reload();
        },
        error: function (gagal) {
            console.log(gagal)
        }
    })
})
})

// ----------------------------------------------------------------

// javascript dari modal 
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}