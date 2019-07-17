$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var alamat_artikel = 'api/artikel'
    var alamat_kategori = 'api/kategori'
    var alamat_tag = 'api/tag'

    $.ajax({
        url: alamat_artikel,
        method: "GET",
        dataType: "json",
        
        success: function (berhasil) {
            // console.log(berhasil)
            $.each(berhasil.data, function (key, value) {
                
                $("#bagian-konten").append(
                    `
                    <div class="col-12 col-lg-8">
                    <div class="single-blog-content mb-100">
                        <!-- Post Meta -->
                        <div class="post-meta">
                            <p><a href="#" class="post-author">${value.user.name}</a> on <a href="#" class="post-date">${value.created_at}</a></p>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <h6>
                                ${value.konten}
                            </h6>
                            <!-- Post Tags -->
                            <ul class="post-tags">
                                <li><a href="#">Manual</a></li>
                                <li><a href="#">Liberty</a></li>
                                <li><a href="#">Recommendations</a></li>
                                <li><a href="#">Interpritation</a></li>
                            </ul>
                            <!-- Post Meta -->
                            <div class="post-meta second-part">
                                <p><a href="#" class="post-author">${value.user.name}</a> on <a href="#" class="post-date">${value.created_at}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                    `               
                )
                
            }) 
        }
    })

    $.ajax({
        url: alamat_kategori,
        method: "GET",
        dataType: "json",
        
        success: function (berhasil) {
            // console.log(berhasil)
            $.each(berhasil.data, function (key, value) {
                
                $("#inikategori").append(
                    `
                     <ul>
                        <li>
                        <div class="post-cta"><a href="#">${value.nama_kategori}</a></div>
                        <hr>
                        </li>
                     </ul>
                    `               
                )
            }) 
        }
    })

    $.ajax({
        url: alamat_tag,
        method: "GET",
        dataType: "json",
        
        success: function (berhasil) {
            // console.log(berhasil)
            $.each(berhasil.data, function (key, value) {
                
                $("#initag").append(
                    `
                     <ul>
                        <li>
                        <div class="post-cta"><a href="/tampilan/blog-tag/${value.slug}""># ${value.nama_tag}</a></div>
                        <hr>
                        </li>
                     </ul>
                    `               
                )
            }) 
        }
    })
})