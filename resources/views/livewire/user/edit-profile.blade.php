
<div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Profile</h5>
                

                    <form wire:submit.prevent="editprofile">
                    <div class="mb-2">
                        <label for="floatingnameInput">Name</label>
                        <input type="text" class="form-control form-control-md" placeholder="Enter Name"
                                                                    value="" wire:model="name" readonly>
                                                                
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                    <label for="floatingnameInput">Nick Name</label>
                        <input type="text" class="form-control form-control-md" placeholder="Enter NickName"
                            value="" wire:model="nickname">
                     
                    @error('nickname') <span class="error">{{ $message }}</span> @enderror
                  </div>
                <div class="mb-2">
                    <label for="name">Avatar</label>
                    <input type="file" class="form-control form-control-md" 
                        value="" wire:model="avatar">     
                        @error('avatar') <span class="error">{{ $message }}</span> @enderror                                     
                </div>
                  
                        <div>
                            <button type="submit" class="btn btn-primary">
                            <span wire:loading wire:target="editprofile">
                            <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i>
                            </span>
                            <span>Submit</span>

                            </button>
                            <button type="button" class="btn btn-warning w-md" onclick="window.location.href='{{ route('showprofile',['id'=>Auth::user()->id]) }}'">Cancel</button>
                        </div>
                    </form>
                        <div wire:loading wire:target="editprofile" >
                            Processing...
                        </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->