<x-app-layout>
    <div class="max-w-3xl mx-auto space-y-6">
        <div>
            <h1 class="text-2xl font-semibold text-gray-900">
                Create Event
            </h1>


        <p class="mt-1 text-sm text-gray-600">
            Create a new event and assign it to an organization.
        </p>
    </div>

    <div class="p-6 bg-white border border-gray-200 shadow-sm rounded-xl">
        <form method="POST" action="{{ route('events.store') }}" class="space-y-5">
            @csrf

            <div>
                <x-input-label for="organization_id" :value="__('Organization')" />

                <select
                    name="organization_id"
                    id="organization_id"
                    required
                    @class([
                        'mt-1 block w-full rounded-lg border bg-white px-3 py-2 text-sm text-gray-900 shadow-sm',
                        'border-red-500 focus:border-red-500 focus:ring-2 focus:ring-red-500' => $errors->has('organization_id'),
                        'border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-500' => !$errors->has('organization_id'),
                    ])
                >
                    <option value="" hidden>Select organization</option>

                    @foreach ($organizations as $organization)
                        <option
                            value="{{ $organization->id }}"
                            @selected(old('organization_id') == $organization->id)
                        >
                            {{ $organization->name }}
                        </option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('organization_id')" />
            </div>

            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input
                    id="name"
                    type="text"
                    name="name"
                    :value="old('name')"
                    autofocus
                    class="mt-1"
                />

                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div>
                <x-input-label for="slug" :value="__('Slug')" />
            
                <x-text-input
                    id="slug"
                    type="text"
                    name="slug"
                    :value="old('slug')"
                    class="mt-1"
                    data-auto-slug
                />
            
                <p class="mt-1 text-xs text-gray-500">
                    Automatically generated from the event name. You can edit it if needed.
                </p>
            
                <x-input-error :messages="$errors->get('slug')" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Description')" />

                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    class="block w-full px-3 py-2 mt-1 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-500"
                >{{ old('description') }}</textarea>

                <x-input-error :messages="$errors->get('description')" />
            </div>

            <div class="grid gap-5 sm:grid-cols-2">
                <div>
                    <x-input-label for="starts_at" :value="__('Starts At')" />

                    <x-text-input
                        id="starts_at"
                        type="datetime-local"
                        name="starts_at"
                        :value="old('starts_at')"
                        class="mt-1"
                    />

                    <x-input-error :messages="$errors->get('starts_at')" />
                </div>

                <div>
                    <x-input-label for="ends_at" :value="__('Ends At')" />

                    <x-text-input
                        id="ends_at"
                        type="datetime-local"
                        name="ends_at"
                        :value="old('ends_at')"
                        class="mt-1"
                    />

                    <x-input-error :messages="$errors->get('ends_at')" />
                </div>
            </div>

            <div class="flex justify-end">
                <x-primary-button>
                    {{ __('Create Event') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        const nameInput = document.getElementById('name');
        const slugInput = document.querySelector('[data-auto-slug]');

        let slugWasManuallyEdited = false;

        function generateSlug(value) {
            return value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }

        nameInput.addEventListener('input', function () {
            if (!slugWasManuallyEdited) {
                slugInput.value = generateSlug(this.value);
            }
        });

        slugInput.addEventListener('input', function () {
            slugWasManuallyEdited = true;
        });
    </script>
@endpush

</x-app-layout>
