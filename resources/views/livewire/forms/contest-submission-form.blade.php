<div>
    <div x-data="{
            attach: 'No'
        }"
         class="overflow-hidden py-4 px-4 mx-auto max-w-7xl bg-white">
        <div class="">
            <img src=""
                 class=""
                 alt=""
            />
        </div>
        <div class="relative mx-auto">
            <div class="content">
                <h2>Building Latter-day Faith - 2023 Conference Art Contest Submission Form</h2>
            </div>
            <div class="mt-12">
                @if($success === false)
                    <form wire:submit.prevent="save" class="grid grid-cols-1 gap-y-6 sm:gap-x-8">
                        <input wire:model.defer="role"
                               type="hidden"
                               name="role"
                               id="role"
                               value="">
                        <div class="m2-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Contact Info</h3>
                            <div class="my-2 text-xs font-medium">Fields with <span class="text-base text-red-700">*</span> are required.</div>
                        </div>
                        <div>
                            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name <span class="text-base text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="firstName"
                                               type="text"
                                               id="first-name"
                                               autocomplete="given-name"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('firstName') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('firstName') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name <span class="text-base text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="lastName"
                                               type="text"
                                               id="last-name"
                                               autocomplete="family-name"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('lastName') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('lastName') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-base text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="email"
                                               id="email"
                                               type="email"
                                               autocomplete="email"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('email') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('email') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone <span class="text-base text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="phone"
                                               id="phone"
                                               type="text"
                                               autocomplete="phone"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('phone') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('phone') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="mb-4 space-y-4">
                                <div class="flex relative items-start">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="subscribeToNewsletter"
                                               id="subscribe_to_newsletter"
                                               name="subscribe_to_newsletter"
                                               type="checkbox"
                                               class="w-4 h-4 border-gray-300 text-secondary focus:ring-secondary"
                                               value="1"
                                        >
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="subscribe_to_newsletter" class="font-medium text-gray-700">Receive monthly updates from the Wilford Woodruff Papers Foundation</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-cols-1 gap-y-6">
                                <div>
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address <span class="text-base text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="address"
                                               id="address"
                                               type="text"
                                               autocomplete="address"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('address') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('address') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="pt-4"/>
                        <div class="my-4">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Submission Info</h3>
                        </div>

                        <div>
                            <div class="grid grid-cols-1 gap-y-6">
                                <div>
                                    <label for="title" class="block text-sm font-medium text-gray-700">Title <span class="text-base text-red-700">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="title"
                                               id="title"
                                               type="text"
                                               autocomplete="title"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('title') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('title') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <label for="connection" class="block text-sm font-medium text-gray-700">Connection to Wilford Woodruff <span class="text-base text-red-700">*</span></label>
                            <p class="mt-2 text-sm text-gray-500">
                                Please include a quote, story, or citation of how your entry relates to Wilford Woodruff.
                            </p>
                            <div class="mt-1">
                                <textarea wire:model.defer="connection"
                                          id="connection"
                                          rows="4"
                                          class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary border  @error('connection') border-red-500 @else border-gray-300 @enderror"></textarea>
                            </div>
                            @error('connection') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                        </div>

                        <div class="">
                            <label for="division" class="block text-sm font-medium text-gray-700">Division <span class="text-base text-red-700">*</span></label>
                            <div class="mt-1">
                                <select wire:model.defer="division"
                                        id="division"
                                        name="division"
                                        autocomplete="division"
                                        class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm  @error('email') border-red-500 @else border-gray-300 @enderror rounded-md">
                                    <option>-- Select One --</option>
                                    @foreach(\App\Models\ContestSubmission::$divisions as $key => $division)
                                        <option value="{{ $key }}">{{ $division }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('division') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                        </div>

                        <div class="grid md:grid-cols-2">
                            <div class="">
                                <label for="category" class="block text-sm font-medium text-gray-700">Category <span class="text-base text-red-700">*</span></label>
                                <div class="mt-1">
                                    <select wire:model="category"
                                            id="category"
                                            name="category"
                                            autocomplete="category"
                                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm  @error('category') border-red-500 @else border-gray-300 @enderror rounded-md">
                                        <option>-- Select One --</option>
                                        @foreach(\App\Models\ContestSubmission::$categories as $key => $c)
                                            <option value="{{ $key }}">{{ $c }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('category') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                            </div>

                            <div class="">
                                <label for="medium" class="block text-sm font-medium text-gray-700">Medium <span class="text-base text-red-700">*</span></label>
                                <div class="mt-1">
                                    <select wire:model.defer="medium"
                                            id="medium"
                                            name="medium"
                                            autocomplete="medium"
                                            class="max-w-lg block focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:max-w-xs sm:text-sm  @error('medium') border-red-500 @else border-gray-300 @enderror rounded-md">
                                        <option>-- Select One --</option>
                                        @foreach(\App\Models\ContestSubmission::$medium[$category] as $key => $media)
                                            <option value="{{ $key }}">{{ $media }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('medium') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-cols-1 gap-y-6">
                                <div>
                                    <label for="link" class="block text-sm font-medium text-gray-700">Link to original artwork</label>
                                    <div class="mt-1">
                                        <input wire:model.defer="link"
                                               id="title"
                                               type="text"
                                               value=""
                                               placeholder="https://"
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('link') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('link') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <label for="attach" class="block text-sm font-medium text-gray-700">Need to attach a file?</label>
                            <div class="mt-1">
                                <select x-model="attach"
                                        id="attach"
                                        name="attach"
                                        autocomplete="document-attach"
                                        class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div x-show="attach === 'Yes'"
                             x-cloak
                             class="">
                            <label for="photo" class="block text-sm font-medium text-gray-700">
                                File (20MB Max)
                            </label>
                            <div class="flex items-center mt-1">
                                <input wire:model="fileUpload"
                                       type="file"
                                       class="py-2 px-3 ml-5 text-sm font-medium leading-4 text-gray-700 bg-white rounded-md border border-gray-300 shadow-sm hover:bg-gray-50 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-none" />
                            </div>
                            @error('fileUpload') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                        </div>

                        <div>
                            <div class="mb-4 space-y-4">
                                <p class="text-sm">
                                    ORIGINAL WORK <span class="text-base text-red-700">*</span>
                                </p>
                                <p class="text-sm">
                                    All entries must be original works, based on the entrant’s own concept or premise. Entries that infringe on copyright or have been plagiarized entirely or contain plagiarized elements will be disqualified.
                                </p>
                                <div class="flex relative items-start">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="original"
                                               id="original"
                                               name="original"
                                               type="checkbox"
                                               required
                                               class="w-4 h-4 border-gray-300 text-secondary focus:ring-secondary"
                                               value="1"
                                        >
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="original" class="font-medium text-gray-700">I understand</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="mb-4 space-y-4">
                                <p class="text-sm">
                                    APPROPRIATE CONTENT <span class="text-base text-red-700">*</span>
                                </p>
                                <p class="text-sm">
                                    The Wilford Woodruff Papers Foundation seeks to be a positive influence for young artists and their families. Consequently, only submissions deemed “family-friendly” in nature will be accepted. Entries that contain violent, bigoted, or sexually-explicit elements will not be considered for entry in the contest or for display at the venue. The Foundation reserves the right to determine whether any entry meets these standards.
                                </p>
                                <div class="flex relative items-start">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="appropriate"
                                               id="appropriate"
                                               name="appropriate"
                                               type="checkbox"
                                               required
                                               class="w-4 h-4 border-gray-300 text-secondary focus:ring-secondary"
                                               value="1"
                                        >
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="appropriate" class="font-medium text-gray-700">I understand</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <label for="collaborators" class="block text-sm font-medium text-gray-700">Collaborators</label>
                            <p class="mt-2 text-sm text-gray-500">
                                If this submission is a collaboration, please enter the email addresses of each collaborator separated by a semicolon (;). They will receive an email prompting them to enter their contact information and certify that the work is original and appropriate.
                            </p>
                            <div class="mt-1">
                                <textarea wire:model.defer="collaborators"
                                          id="collaborators"
                                          rows="4"
                                          placeholder="john@example.com;jane@example.com"
                                          class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary border  @error('collaborators') border-red-500 @else border-gray-300 @enderror"></textarea>
                            </div>
                            @error('collaborators') <div class="mt-1 text-sm text-red-500">{{ $message }}</div> @enderror
                        </div>
                        <div class="">
                            <button wire:loading.attr="disabled"
                                    wire:loading.class="bg-gray-400"
                                    wire:loading.class.remove="bg-white"
                                    type="submit"
                                    class="block py-3 px-5 w-full text-base font-medium text-white uppercase border border-transparent shadow sm:px-10 focus:outline-none bg-secondary hover:bg-secondary-400">
                                <span wire:loading.remove>Submit</span>
                                <span wire:loading
                                      class="flex items-center px-7"
                                >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 animate-spin">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>

                                    </span>
                            </button>
                        </div>
                    </form>
                @elseif($success === true)
                    <div>
                        <p class="p-4 text-xl font-medium">
                            Thank you entering the Art Contest at the first Wilford Woodruff Papers Foundation Conference!
                        </p>
                        <p class="p-4 text-lg">
                            Judging will take place after the deadline of February 1st, 2023. If there are any issues with your submission we will contact you as soon as possible.
                        </p>
                        <p class="p-4 text-lg">
                            We look forward to seeing you at the conference in March!
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
