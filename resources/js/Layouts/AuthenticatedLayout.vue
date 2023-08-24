<script setup>
import {ref} from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import {Link} from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>

    <div>
        <aside>
            <!-- Responsive Navigation Menu -->
            <div
                class="xl:block bg-white absolute z-50 shadow-lg top-0 border-r-2 border-gray-500 h-full w-64  overflow-hidden transition transform duration-150 ease-in-out xl:w-20 hover:md:w-2/12"
                :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }">
                <div class="pt-2 pb-3 space-y-1">
                    <!-- Logo -->
                    <div class="justify-between shrink-0 flex items-center ml-4 mt-2">
                        <Link :href="route('dashboard')">
                            <ApplicationLogo
                                class="block h-9 w-auto fill-current text-gray-800"
                            />
                        </Link>
                        <button @click="showingNavigationDropdown = false"
                                class="xl:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 mr-2"
                        >
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>

                    <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                        Dashboard
                    </ResponsiveNavLink>
                </div>
            </div>
        </aside>

        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Hamburger -->
                            <div class="-mr-2 flex items-center xl:hidden">
                                <button
                                    @click="showingNavigationDropdown = true"
                                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500"
                                >
                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="sm:flex sm:items-center sm:ml-6">
                            <!-- User Quick Profile Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                <img src="/defaults/avatar-man.png" alt="user profile"
                                                     class="h-10 rounded-full"/>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <div
                                            class="block w-full px-4 py-2 text-left leading-5 font-medium text-base text-gray-800">
                                            Hi, {{ $page.props.auth.user.name }}
                                        </div>
                                        <hr>
                                        <DropdownLink :href="route('profile.edit')"> Profile</DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"/>
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot/>
            </main>
        </div>
    </div>

    <div class="fixed z-40 bg-gray-950 bg-opacity-60 inset-0 cursor-pointer transition-opacity duration-75 ease-in-out"
         :class="{ 'opacity-100 pointer-events-auto': showingNavigationDropdown, 'opacity-0 pointer-events-none': !showingNavigationDropdown }"
         @click="showingNavigationDropdown = !showingNavigationDropdown"></div>
</template>
