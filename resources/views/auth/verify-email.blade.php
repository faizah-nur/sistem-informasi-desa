<x-guest-layout>
    <div class="mb-4 text-sm text-green-700">
        {{ __('auth.verify_email_notice') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('auth.verification_link_sent') }}
        </div>
    @endif

    <div class="mt-6 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button class="bg-green-600 hover:bg-green-700 focus:ring-green-500">
                {{ __('auth.resend_verification_email') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="underline text-sm text-green-700 hover:text-green-900 rounded-md
                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"
            >
                {{ __('auth.logout') }}
            </button>
        </form>
    </div>
</x-guest-layout>
