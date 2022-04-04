<div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">First Time Login</h5>
                                            <p>Change your password</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <a href="index.html">
                                        <div class="avatar-md profile-user-wid mb-4">
                                        
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form wire:submit.prevent="changepassword">
            
                                        <!-- <div class="user-thumb text-center mb-4">
                                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle img-thumbnail avatar-md" alt="thumbnail">
                                            <h5 class="font-size-15 mt-3">Maria Laird</h5>
                                        </div> -->
            
                                        <div class="mb-3">
                                            <label for="userpassword">New Password</label>
                                            <input type="password" wire:model="password" class="form-control"  placeholder="Enter password">
                                            @error('password') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword">Confirm Password</label>
                                            <input type="password" wire:model="password_confirmation" class="form-control" placeholder="Confirm password">
                                            @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                                        </div>
            
                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                            <span wire:loading wire:target="changepassword">
                                                            <i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i>
                                                </span>    
                                                <span>Submit</span>
                                        </button>
                                        </div>
    
                                    </form>
                                </div>
            
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>