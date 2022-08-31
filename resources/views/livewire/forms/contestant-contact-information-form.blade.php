<div>
    <div x-data="{

        }"
         class="max-w-7xl mx-auto bg-white py-4 px-4 overflow-hidden">
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
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Contact Info</h3>
                            <div class="text-xs font-medium my-2">Fields with <span class="text-red-700 text-base">*</span> are required.</div>
                        </div>
                        <div>
                            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name <span class="text-red-700 text-base">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="firstName"
                                               type="text"
                                               id="first-name"
                                               autocomplete="given-name"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('firstName') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('firstName') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name <span class="text-red-700 text-base">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="lastName"
                                               type="text"
                                               id="last-name"
                                               autocomplete="family-name"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('lastName') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('lastName') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email <span class="text-red-700 text-base">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="email"
                                               id="email"
                                               type="email"
                                               autocomplete="email"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('email') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('email') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone <span class="text-red-700 text-base">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="phone"
                                               id="phone"
                                               type="text"
                                               autocomplete="phone"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('phone') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('phone') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="mb-4 space-y-4">
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="subscribeToNewsletter"
                                               id="subscribe_to_newsletter"
                                               name="subscribe_to_newsletter"
                                               type="checkbox"
                                               class="focus:ring-secondary h-4 w-4 text-secondary border-gray-300"
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
                                    <label for="address" class="block text-sm font-medium text-gray-700">Address <span class="text-red-700 text-base">*</span></label>
                                    <div class="mt-1">
                                        <input wire:model.defer="address"
                                               id="address"
                                               type="text"
                                               autocomplete="address"
                                               value=""
                                               required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-secondary focus:border-secondary @error('address') border-red-500 @else border-gray-300 @enderror">
                                    </div>
                                    @error('address') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="pt-4"/>

                        <div>
                            <div class="mb-4 space-y-4">
                                <p class="text-sm">
                                    ORIGINAL WORK <span class="text-red-700 text-base">*</span>
                                </p>
                                <p class="text-sm">
                                    All entries must be original works, based on the entrant’s own concept or premise. Entries that infringe on copyright or have been plagiarized entirely or contain plagiarized elements will be disqualified.
                                </p>
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="original"
                                               id="original"
                                               name="original"
                                               type="checkbox"
                                               required
                                               class="focus:ring-secondary h-4 w-4 text-secondary border-gray-300"
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
                                    APPROPRIATE CONTENT <span class="text-red-700 text-base">*</span>
                                </p>
                                <p class="text-sm">
                                    The Wilford Woodruff Papers Foundation seeks to be a positive influence for young artists and their families. Consequently, only submissions deemed “family-friendly” in nature will be accepted. Entries that contain violent, bigoted, or sexually-explicit elements will not be considered for entry in the contest or for display at the venue. The Foundation reserves the right to determine whether any entry meets these standards.
                                </p>
                                <div class="relative flex items-start">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="appropriate"
                                               id="appropriate"
                                               name="appropriate"
                                               type="checkbox"
                                               required
                                               class="focus:ring-secondary h-4 w-4 text-secondary border-gray-300"
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
                            <button type="submit"
                                    class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent shadow-sm text-base uppercase font-medium text-white bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary">Submit</button>
                        </div>
                    </form>
                @elseif($success === true)
                    <div>
                        <p class="p-4 text-xl font-medium">
                            Thank you for updating your contact information!
                        </p>
                        <p class="p-4 text-lg">
                            We will get back with you shortly.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>