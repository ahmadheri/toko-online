@extends('layouts.global')

@section('footer-scripts')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

   <script>
      $('#categories').select2({
         ajax: {
            url: 'http://localhost:8000/ajax/categories/search',
            processResults: function(data){
               return {
                  results: data.map(function(item) { return {id: item.id, text: item.name }
                  })
               }
            }
         }
      });
   </script>

@endsection

@section('title') Create Books @endsection

@section('pageTitle') Create Books @endsection

@section('content')

   <div class="row">
      <div class="col-md-8">
         <form 
            action="{{ route('books.store')}}"
            method="POST"
            enctype="multipart/form-data"
            class="shadow-sm p-3 bg-white">

            @csrf

            <label for="title">Title</label> <br>
            <input 
               value="{{ old('title') }}" 
               type="text" 
               name="title" 
               class="form-control {{ $errors->first('title') ? 'is-invalid' : '' }}" 
               placeholder="Book title"> 
            <div class="invalid-feedback">
               {{ $errors->first('title') }}
            </div>
            <br>

            <label for="cover">Cover</label> <br>
            <input 
               type="file" 
               name="cover" 
               class="form-control {{ $errors->first('cover') ? 'is-invalid' : '' }}">
            <div class="invalid-feedback">
               {{ $errors->first('cover') }}
            </div>
            <br>
            
            <label for="description">Description</label> <br>
            <textarea 
               name="description" 
               id="description" 
               cols="30" rows="10" 
               class="form-control {{ $errors->first('description') ? 'is-invalid' : '' }}" 
               placeholder="Give a description about this book">{{ old('description') }}</textarea>
            <div class="invalid-feedback">
               {{ $errors->first('description') }}
            </div>
            <br>

            <label for="stock">Stock</label> <br>
            <input 
               type="number" 
               name="stock" 
               id="stock" 
               class="form-control {{ $errors->first('stock') ? 'is-invalid' : '' }}" 
               min="0" value=" {{ old('stock') ? old('stock') : 0 }}">
            <div class="invalid-feedback">
               {{ $errors->first('stock') }}
            </div>
            <br>

            <label for="author">Author</label> <br>
            <input 
               value="{{ old('author') }}"
               type="text" 
               name="author" 
               id="author" 
               class="form-control {{ $errors->first('author') ? 'is-invalid' : '' }}" 
               placeholder="Book author">
            <div class="invalid-feedback">
               {{ $errors->first('author') }}
            </div>
            <br>

            <label for="publisher">Publisher</label> <br>
            <input 
               value="{{ old('publisher') }}"
               type="text" 
               name="publisher" 
               id="publisher" 
               class="form-control {{ $errors->first('publisher') ? 'is-invalid' : '' }}" 
               placeholder="Book publisher">
            <div class="invalid-feedback">
               {{ $errors->first('publisher') }}
            </div>
            <br>

            <label for="price">Price</label> <br>
            <input 
               value="{{ old('price') }}"
               type="number" 
               name="price" 
               id="price" 
               class="form-control {{ $errors->first('price') ? 'is-invalid' : '' }}" 
               placeholder="Book price">
            <div class="invalid-feedback">
               {{ $errors->first('price') }}
            </div>
            <br>

            <label for="categories">Categories</label>
            <select 
               name="categories[]"
               multiple
               id="categories"
               class="form-control">
               
            </select>
            <br><br>

            <button 
               class="btn btn-primary"
               name="save_action"
               value="PUBLISH">
               Publish
            </button>

            <button
               class="btn btn_secondary"
               name="save_action"
               value="DRAFT">
               Save as Draft
            </button>


         </form>
      </div>
   </div>

@endsection