 @extends('admin.layouts.vertical', ['title' => 'Add markquee'])

 @section('content')

 <div class="container-xxl">
     <div class="row">
         <div class="col-xl-12 col-lg-8 ">
             <form action="{{route('markquee.manage_markquee_process')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 <div class="card">
                     <div class="card-header">
                         <h4 class="card-title">Markquee Information</h4>
                     </div>
                     <div class="card-body">

                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="mb-3">
                                     <label for="markquee-name" class="form-label">Markquee Name <span
                                             class="text-primary">(*)</span></label>
                                     <input type="text" id="markquee-name" class="form-control"
                                         placeholder="Enter Markquee Name" value="{{$text}}"
                                         name="text" required>
                                     @error('text')
                                     <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                         <button type="button" class="btn-close" data-bs-dismiss="alert"
                                             aria-label="Close"></button>
                                         {{$message}}
                                     </div>
                                     @enderror
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <div class="mb-3">
                                     <label for="markquee-name2" class="form-label">Markquee Name 2 <span
                                             class="text-primary">(*)</span></label>
                                     <input type="text" id="markquee-name2" class="form-control"
                                         placeholder="Enter Markquee Name" value="{{$text}}"
                                         name="text2" required>
                                     @error('text')
                                     <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                         <button type="button" class="btn-close" data-bs-dismiss="alert"
                                             aria-label="Close"></button>
                                         {{$message}}
                                     </div>
                                     @enderror
                                 </div>
                             </div>

                         </div>
                         <div class="row mb-4">

                             <div class="col-lg-6">
                                 <div class="mt-3">
                                     <h5 class="text-dark fw-medium">Markquee Status <span
                                             class="text-primary">(*)</span>
                                     </h5>
                                     <div class="d-flex flex-wrap gap-2 form-switch" role="group">
                                         <!-- hidden field to always send status -->
                                         <input type="hidden" name="status" id="hiddenStatusmarkquee" value="<?= $status ?>">

                                         <!-- actual visible switch -->
                                         <input class="form-check-input" type="checkbox" role="switch" id="activeSwitchmarkquee"
                                             <?= $status == 1 ? 'checked' : '' ?>>
                                         <label class="form-check-label" for="activeSwitchmarkquee" id="statusLabelmarkquee">
                                             <?= $status == 1 ? 'Active' : 'Inactive' ?>
                                         </label>

                                     </div>
                                 </div>
                             </div>
                         </div>



                     </div>
                 </div>


                 <input type="hidden" name="id" value="{{$id}}" />

                 <div class="p-3 bg-white mb-3 rounded">
                     <div class="row justify-content-end">
                         <div class="col-lg-2">
                             @if($id > 1)
                             <input class="btn btn-primary w-100" type="submit" value="Update markquee">
                             @else
                             <input class="btn btn-primary w-100" type="submit" value="Create markquee">
                             @endif
                         </div>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>

 <script>
     // status switch
     const switchInput = document.getElementById('activeSwitchmarkquee');
     const statusLabelmarkquee = document.getElementById('statusLabelmarkquee');
     const hiddenStatusmarkquee = document.getElementById('hiddenStatusmarkquee');

     switchInput.addEventListener('change', function() {
         if (this.checked) {
             statusLabelmarkquee.textContent = 'Active';
             hiddenStatusmarkquee.value = '1'; // send 1
         } else {
             statusLabelmarkquee.textContent = 'Inactive';
             hiddenStatusmarkquee.value = '0'; // send 0
         }
     });
 
 </script>

 @endsection