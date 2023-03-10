@extends('backend.layouts.app');

@section('content')
  @if ($msg = Session::get('msg'))
    <div class="alert alert-success">{{ $msg }}</div>
  @endif

  <div class="nk-block-head-content">
    <h3 class="nk-block-title page-title">Products</h3>
  </div><!-- .nk-block-head-content -->
  <div class="nk-block-head-content">
    <div class="toggle-wrap nk-block-tools-toggle">
      <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
          class="icon ni ni-more-v"></em></a>
      <div class="toggle-expand-content" data-content="pageMenu">
        <ul class="nk-block-tools g-3">
          <li>
            <div class="form-control-wrap">
              <div class="form-icon form-icon-right">
                <em class="icon ni ni-search"></em>
              </div>
              <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
            </div>
          </li>
          <li>
            <div class="drodown">
              <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                data-bs-toggle="dropdown">Status</a>
              <div class="dropdown-menu dropdown-menu-end">
                <ul class="link-list-opt no-bdr">
                  <li><a href="#"><span>New Items</span></a></li>
                  <li><a href="#"><span>Featured</span></a></li>
                  <li><a href="#"><span>Out of Stock</span></a></li>
                </ul>
              </div>
            </div>
          </li>
          <li class="nk-block-tools-opt">

            <a href="{{ route('products.create') }}" class=" btn btn-primary "><em class="icon ni ni-plus"></em><span>Add
                Product</span></a>
          </li>
        </ul>
      </div>
    </div>
  </div><!-- .nk-block-head-content -->
  </div><!-- .nk-block-between -->
  </div><!-- .nk-block-head -->
  <div class="nk-block">
    <div class="card">
      <div class="card-inner-group">
        <div class="card-inner p-0">
          <div class="nk-tb-list">
            <div class="nk-tb-item nk-tb-head">
              <div class="nk-tb-col nk-tb-col-check">
                <div class="custom-control custom-control-sm custom-checkbox notext">
                  <input type="checkbox" class="custom-control-input" id="pid">
                  <label class="custom-control-label" for="pid"></label>
                </div>
              </div>
              <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
              <div class="nk-tb-col"><span>Product Details</span></div>
              <div class="nk-tb-col"><span>Product Price</span></div>

              <div class="nk-tb-col tb-col-md"><span>Stock</span></div>
              <div class="nk-tb-col tb-col-md"><span>Category</span></div>
              <div class="nk-tb-col tb-col-md"><em class="tb-asterisk icon ni ni-star-round"></em></div>
              <div class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1 my-n1">
                  <li class="me-n1">
                    <div class="dropdown">
                      <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em
                          class="icon ni ni-more-h"></em></a>
                      <div class="dropdown-menu dropdown-menu-end">
                        <ul class="link-list-opt no-bdr">
                          <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Product</span></a>
                          </li>
                          <li><a href="#"><em class="icon ni ni-trash "></em><span>Remove
                                Product</span></a>
                          </li>
                          <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a>
                          </li>
                          <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div><!-- .nk-tb-item -->

            @foreach ($products as $product)
              <div class="nk-tb-item">
                <div class="nk-tb-col nk-tb-col-check">
                  <div class="custom-control custom-control-sm custom-checkbox notext">
                    <input type="checkbox" class="custom-control-input" id="pid1">
                    <label class="custom-control-label" for="pid1"></label>
                  </div>
                </div>
                <div class="nk-tb-col tb-col-sm">
                  <span class="tb-product">
                    <img src="{{ 'product_photos/' . $product->product_image }}" alt="" class="thumb">
                    <span class="title">{{ $product->product_name }}</span>
                  </span>
                </div>
                <div class="nk-tb-col">
                  <span class="tb-led">
                    {{ Str::limit($product->product_details, 30, '...') }}
                  </span>
                </div>
                <div class="nk-tb-col">
                  <span class="tb-lead">{{ $product->product_price }}</span>
                </div>
                <div class="nk-tb-col">
                  <span class="tb-sub">{{ $product->product_stock }}</span>
                </div>
                <div class="nk-tb-col">
                  <span class="tb-sub">{{ $product->product_category }}</span>
                </div>

                <div class="nk-tb-col tb-col-md">
                  <div class="asterisk tb-asterisk">
                    <a href="#"><em class="asterisk-off icon ni ni-star"></em><em
                        class="asterisk-on icon ni ni-star-fill"></em></a>
                  </div>
                </div>
                <div class="nk-tb-col nk-tb-col-tools">
                  <ul class="nk-tb-actions gx-1 my-n1">
                    <li class="me-n1">
                      <div class="dropdown">
                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                          data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-end">
                          <ul class="link-list-opt no-bdr">
                            <li><a href="{{ route('products.edit', $product->id) }}"><em
                                  class="icon ni ni-edit"></em><span>Edit Product</span></a>
                            </li>
                            <li><a href="{{ route('products.show', $product->id) }}"><em
                                  class="icon ni ni-eye"></em><span>View Product</span></a></li>
                            <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product
                                  Orders</span></a></li>
                            <li>
                              <form method="POST" action="{{ route('products.destroy', $product->id) }}"
                                onsubmit="return confirm('Are you sure?')">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit"><em class="icon ni ni-trash"></em>Remove
                                  Product</button>
                              </form>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div><!-- .nk-tb-item -->
            @endforeach

          </div><!-- .nk-tb-list -->
        </div>
        <div class="card-inner">
          <div class="nk-block-between-md g-3">
            <div class="g">
              {{ $products->links('vendor/pagination/bootstrap-4') }}
              {{-- {{Str::limit($products->links('vendor/pagination/bootstrap-4'),3,'...')}} --}}
              <!-- .pagination -->
            </div>

          </div><!-- .nk-block-between -->
        </div>
      </div>
    </div>
  </div><!-- .nk-block -->
  <div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any"
    data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="nk-block-head">
      <div class="nk-block-head-content">
        <h5 class="nk-block-title">New Product</h5>
        <div class="nk-block-des">
          <p>Add information and add new product.</p>
        </div>
      </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
      <div class="row g-3">
        <form class="form" method="post" action="{{ url('/products') }}" enctype="multipart/form-data">
          @csrf
          <div class="col-12">
            <div class="form-group">
              <label class="form-label" for="product-title">Product name</label>
              <div class="form-control-wrap">
                <input type="text" class="form-control" name="product_name" id="product_name">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label" for="sale-price">Product Details</label>
              <div class="form-control-wrap">
                <textarea name="product_details" class="form-control" id="product_details" cols="10" rows="5"></textarea>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label" for="regular-price">Product Price</label>
              <div class="form-control-wrap">
                <input type="number" name="product_price" class="form-control" id="product_price">
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <label class="form-label" for="regular-price">Product Stock</label>
              <div class="form-control-wrap">
                <input type="number" name="product_stock" class="form-control" id="product_stock">
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="form-group">
              <label class="form-label" for="category">Category</label>
              <div class="form-control-wrap">

                <select name="product_category" class="form-control" id="product_category">
                  <option value="" selected disabled>Select one</option>

                  @foreach ($cats as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                  @endforeach

                </select>
              </div>
            </div>
          </div>

          {{-- <div class="col-12">
                                
                                    <div class="form-control-wrap">
                                        <input type="file" name="product_image" class="form-control" id="product_image">
                                    </div>
                                </div> --}}
      </div>
      <div class="col-12">
        <button type="button" id="addnew" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add
            New</span></button>
      </div>
      </form>
    </div>
  </div><!-- .nk-block -->
  </div>
  </div>
  </div>
  </div>
  </div>
@endsection
