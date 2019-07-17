$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    var alamat_artikel = '/api/admin/artikel'
    var alamat_kategori = '/api/admin/kategori'
    var alamat_tag = '/api/admin/tag'

    $.ajax({
        url: alamat_artikel,
        method: "GET",
        dataType: "json",
        
        success: function (berhasil) {
            // console.log(berhasil)
            $.each(berhasil.data, function (key, value) {
                
                $("#isinya").append(
                    `
                            

                        <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="../assets/img/artikel/${value.foto}" width="130" height="80" alt="">
                                <div class="post-cta"><a href="/blog-kategori/${value.kategori.slug}">${value.kategori.nama_kategori}</a></div>
                            </div>
                            
                            <!-- Post Content -->
                            <div class="post-content">
                                <a href="/blog/${value.slug}" class="headline">
                                    <h5>${value.judul}</h5>
                                </a>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p><a href="#" class="post-author">${value.user.name}</a> on <a href="#" class="post-date">${value.created_at}</a></p>
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
                
                $(".kategori").append(
                    `
                     <ul>
                        <li>
                        <div class="post-cta"><a href="/blog-kategori/${value.slug}">${value.nama_kategori}</a></div>
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
                
                $(".tag").append(
                    `
                     <ul>
                        <li>
                        <div class="post-cta"><a href="/blog-tag/${value.slug}"># ${value.nama_tag}</a></div>
                        <hr>
                        </li>
                     </ul>
                    `               
                )
            }) 
        }
    })
    

})