@php
    $alertType = session('alert')['type'];
    $alertMessage = session('alert')['message'];
@endphp

<div x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 5000)" class="absolute max-w-lg bottom-5 right-5">
    <div x-show="show" x-transition role="alert" class="w-full p-4 border-l-[5px] {{ $alertType === 'success' ? 'border-success' : 'border-error' }} rounded-md shadow-lg bg-container text-text-primary">
        <h5 class="mb-1 font-medium leading-none tracking-tight">
            {{ $alertType === 'success' ? 'Success!' : 'Alert!' }}
        </h5>
        <p class="mt-2 text-sm font-medium text-text-secondary">
            {{ $alertMessage }}
        </p>
    </div>
</div>
