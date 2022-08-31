 {{-- modal to add blog --}}
 <div class="modal fade" id="exampleModal" tabindex="" aria-labelledby="exampleModalLabel" aria-hidden="">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="" method="POST" enctype="multipart/form-data" id="form_add_category">
                 @csrf
                 <div class="modal-body">
                     <div class="mb-3">
                         <input type="text" placeholder="Your name" name="name" id="name"
                             class="form-control">
                         <small class="text-danger name_error" id="name_error" ></small>

                     </div>




                     <div class="mb-3">
                         <label for="">Image</label>
                         <input type="file" name="image" id="image"
                             class="form-control ">
                             <small class="text-danger" id="image_error"></small>
                     </div>


                     <div class="mb-3">
                        <label for="">Parent</label>
                        <select name="parent_id" class="form-control">
                            <option value="">--Select--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-danger name_error" id="parent_id_error" ></small>
                    </div>
                     <div class="modal-footer">
                         <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <button type="submit" id="id="add_category"" class=" btn btn-primary">Add</button>
                     </div>
             </form>
         </div>
     </div>

 </div>
 {{-- End model to add blog --}}
