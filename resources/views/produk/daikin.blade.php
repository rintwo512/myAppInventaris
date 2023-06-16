@extends('layouts.main')

@section('content')


<div class="card-body">
                   <div class="product-grid">
                     <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3" id="cardBody">
                                                         
                    </div><!--end row-->
                    </div>
    <!-- <nav class="float-end mt-4" aria-label="Page navigation">
      <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav> -->

  </div>
</div>



                    
                    <!-- Modal -->
                    <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body" id="modal-body">
                         
                            
                          
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>                           
                          </div>
                        </div>
                      </div>
                    </div>
            

<script>
// $.ajax({
//   url: "https://www.blibli.com/backend/search/products?sort=&page=1&start=0&searchTerm=oppo&intent=true&merchantSearch=true&multiCategory=true&customUrl=&&channelId=web&showFacet=false&userIdentifier=657116261.U.2912043991806810.1686823702&isMobileBCA=false",

$.ajax({
//   url: "https://www.blibli.com/backend/search/products?sort=&page=1&start=0&searchTerm=ac%20daikin&intent=true&merchantSearch=true&multiCategory=true&customUrl=&&channelId=web&showFacet=false&userIdentifier=657116261.U.2912043991806810.1686823702&isMobileBCA=false",

  url: "https://www.blibli.com/backend/search/products?sort=&page=5&start=160&searchTerm=air%20conditioner&intent=true&merchantSearch=true&multiCategory=true&customUrl=&&channelId=web&showFacet=false&userIdentifier=657116261.U.2912043991806810.1686823702&isMobileBCA=false",

  success: res =>{
    console.log(res);
    const datas = res.data.products;
    
    let card = "";
    for(d of datas){
        card += functUI(d);       
    }

    $("#cardBody").html(card);

    const datass = document.querySelectorAll("#btnDetails");
    for(da of datass){
        da.addEventListener("click", function() {
            const formattedId = this.dataset.ps;
            const defaultSku = this.dataset.sku;
            const pickupPointCode = this.dataset.point;
            $.ajax({
                url: `https://www.blibli.com/backend/product-detail/products/${formattedId}/_summary?defaultItemSku=${defaultSku}&pickupPointCode=${pickupPointCode}&cnc=false`,
                success : function(res){
                    console.log(res);
                    $("#modal-body").html(funcDet(res.data));
                    // $("#modal-body").append(``).remove();

                            


                }
            })
        });
    }

  }
});

function functUI(e){
    return `<div class="col">
                          <div class="card border shadow-none mb-0 card-img">
                            <div class="card-body text-center img-thumb">
                              <img src="${e.images[0]}" class="img-fluid mb-3 thumb" alt=""/>
                              <h6 class="product-title">${e.name}</h6>
                              <p class="product-price fs-5 mb-1"><span>${e.price.priceDisplay}</span></p>
                              <div class="rating mb-0">
                                <i class="bi bi-star-fill text-warning">${e.review.rating}</i>                                
                              </div>
                              <small>Review ${e.review.count}</small>
                              <div class="actions d-flex align-items-center justify-content-center gap-2 mt-3">
                                <a href="javascript:;" id="btnDetails" class="btn btn-sm btn-outline-primary" data-ps="${e.formattedId}" data-sku="${e.defaultSku}" data-point="${e.pickupPointCode}" data-bs-toggle="modal" data-bs-target="#exampleLargeModal"><i class="bi bi-pencil-fill"></i> Details</a>                                
                              </div>
                            </div>
                          </div>
                       </div>  `;
}


function funcDet(d){
    $(".modal-title").text(d.name);
    return `<div class="card-body">
                                 <ul class="list-group">
                                 <li class="list-group-item">Nama Toko : ${d.merchant.name}</li>
                                 <li class="list-group-item">Lokasi : ${d.shippingAddress.cityName}, ${d.shippingAddress.provinceName},  ${d.shippingAddress.districtName}</li>
                                 <li class="list-group-item">Stock : ${d.stock} Unit</li>
                                 <li class="list-group-item">Kategori : ${d.categories[0].name}</li>
                                 <li class="list-group-item">Garansi : ${d.warranty.text == undefined ? 'Tanpa Garansi' : d.warranty.text}</li>
                                 <li class="list-group-item">Terjual : ${d.statistics.sold} Unit</li>
                               
                                 <li class="list-group-item">Deskripsi : ${d.uniqueSellingPoint}</li>
                                 </ul>
                             </div>`;
}

    

</script>


@endsection

