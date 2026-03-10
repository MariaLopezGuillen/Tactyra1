<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Logout del usuario
     */
    public function logout(Logout $logout): void
{
    $logout();

    $this->redirect(route('login'), navigate: false);
}
}
?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- NAVBAR PRINCIPAL -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- LOGO + LINK -->
            <div class="flex">

                <!-- LOGO -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <img src="{{ asset('img/tactyra-logo.png') }}" alt="logo" style="width:120px;">
                    </a>
                </div>

                <!-- MENU -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                        wire:navigate>

                        Panel de Tactyra

                    </x-nav-link>

                </div>

            </div>

            <!-- DROPDOWN USUARIO -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <x-dropdown align="right" width="48">

                    <!-- BOTÓN USUARIO -->
                    <x-slot name="trigger">

                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white rounded-md hover:text-gray-700">

                            <div
                                x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                                x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name">
                            </div>

                            <div class="ms-1">

                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0
                                        L10 10.586l3.293-3.293a1 1 0
                                        111.414 1.414l-4 4a1 1 0
                                        01-1.414 0l-4-4a1 1 0
                                        010-1.414z"
                                        clip-rule="evenodd"/>
                                </svg>

                            </div>

                        </button>

                    </x-slot>

                    <!-- CONTENIDO DROPDOWN -->
                    <x-slot name="content">

                        <x-dropdown-link
                            :href="route('profile')"
                            wire:navigate>

                            Perfil

                        </x-dropdown-link>

                        <!-- LOGOUT -->
                        <button
                            wire:click="logout"
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">

                            Salir

                        </button>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- HAMBURGUESA -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:bg-gray-100">

                    <svg class="h-6 w-6" viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open}"
                            class="inline-flex"
                            stroke="currentColor"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                        <path
                            :class="{'hidden': ! open}"
                            class="hidden"
                            stroke="currentColor"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </button>

            </div>

        </div>

    </div>

    <!-- MENU RESPONSIVE -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
                wire:navigate>

                Dashboard

            </x-responsive-nav-link>

        </div>

        <!-- PERFIL MOVIL -->
        <div class="pt-4 pb-1 border-t border-gray-200">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800">
                    {{ auth()->user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500">
                    {{ auth()->user()->email }}
                </div>

            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link
                    :href="route('profile')"
                    wire:navigate>

                    Profile

                </x-responsive-nav-link>

                <!-- LOGOUT MOVIL -->
                <button
                    wire:click="logout"
                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">

                    Salir

                </button>

            </div>

        </div>

    </div>

</nav>