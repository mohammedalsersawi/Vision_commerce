 {{-- modal to add blog --}}
 <div class="modal fade" id="exampleModal" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Change Role</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="" method="POST" enctype="multipart/form-data" id="form">
                 @csrf
                 <div class="modal-body">
                     <div class="mb-3">
                         <input type="text" placeholder="Your name" name="name" id="name"
                             class="form-control">
                         <small class="text-danger name_error" id="name_error" ></small>

                     </div>


                     <div class="mb-3">
                         <textarea placeholder="Your content" name="content" id="content"
                             class="form-control"></textarea>
                             <small class="text-danger" id="content_error"></small>



                     </div>

                     <div class="mb-3">
                         <label for="">Image</label>
                         <input type="file" name="image" id="image"
                             class="form-control ">
                             <small class="text-danger" id="image_error"></small>
                     </div>


                     <div class="mb-3">
                         <label for="">category</label>
                         <select name="category_id" id='category_id'
                             class="form-control ">
                             <option value="">--Select--</option>
                             @foreach ($categories as $category)
                                 <option value="{{ $category->id }}">
                                     {{ $category->name }}
                                 </option>
                             @endforeach
                         </select>
                             <small class="text-danger" id="category_id_error"></small>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" id="add_blog" class=" btn btn-primary">Save changes</button>

                     </div>
             </form>
         </div>
     </div>

 </div>
 {{-- End model to add blog --}}
