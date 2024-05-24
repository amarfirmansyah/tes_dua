<script setup lang="ts">

import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import {Link} from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import {ref} from "vue";
import {QueueListIcon, TagIcon} from "@heroicons/vue/24/solid"

const showingNavigationDropdown = ref(false);

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <div class="flex">
                <aside
                    class="flex-col w-64 fixed h-screen px-4 py-8 overflow-y-auto bg-white border-r hidden sm:flex rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
                    <Link :href="route('dashboard')" class="inline-flex items-center gap-2">
                        <ApplicationLogo
                            class="block h-9 w-auto fill-current text-gray-800"
                        />
                        <div>Laravel</div>
                    </Link>

                    <div class="flex flex-col justify-between flex-1 mt-6">
                        <nav>
                            <Link :class="[route().current('dashboard') ? 'bg-gray-100' : '' ]" class="flex items-center px-4 py-2 text-gray-700 rounded-md dark:bg-gray-800 dark:text-gray-200"
                               :href="route('dashboard')">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>

                                <span class="mx-4 font-medium">Dashboard</span>
                            </Link>

                            <Link :class="[route().current('product') ? 'bg-gray-100' : '' ]" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                               :href="route('product')">
                                <QueueListIcon class="w-5 h-5" />

                                <span class="mx-4 font-medium">Product</span>
                            </Link>

                            <Link :class="[route().current('category') ? 'bg-gray-100' : '' ]" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                               :href="route('category')">
                                <TagIcon class="w-5 h-5" />


                                <span class="mx-4 font-medium">Category</span>
                            </Link>

                            <Link :class="[route().current('manufacturer') ? 'bg-gray-100' : '' ]" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                               :href="route('manufacturer')">
                                <TagIcon class="w-5 h-5" />


                                <span class="mx-4 font-medium">Manufacturer</span>
                            </Link>

                            <Link :class="[route().current('unit') ? 'bg-gray-100' : '' ]" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                               :href="route('unit')">
                                <TagIcon class="w-5 h-5" />


                                <span class="mx-4 font-medium">Unit</span>
                            </Link>

                            <Link :class="[route().current('status') ? 'bg-gray-100' : '' ]" class="flex items-center px-4 py-2 mt-5 text-gray-600 transition-colors duration-300 transform rounded-md dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700"
                               :href="route('status')">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.3246 4.31731C10.751 2.5609 13.249 2.5609 13.6754 4.31731C13.9508 5.45193 15.2507 5.99038 16.2478 5.38285C17.7913 4.44239 19.5576 6.2087 18.6172 7.75218C18.0096 8.74925 18.5481 10.0492 19.6827 10.3246C21.4391 10.751 21.4391 13.249 19.6827 13.6754C18.5481 13.9508 18.0096 15.2507 18.6172 16.2478C19.5576 17.7913 17.7913 19.5576 16.2478 18.6172C15.2507 18.0096 13.9508 18.5481 13.6754 19.6827C13.249 21.4391 10.751 21.4391 10.3246 19.6827C10.0492 18.5481 8.74926 18.0096 7.75219 18.6172C6.2087 19.5576 4.44239 17.7913 5.38285 16.2478C5.99038 15.2507 5.45193 13.9508 4.31731 13.6754C2.5609 13.249 2.5609 10.751 4.31731 10.3246C5.45193 10.0492 5.99037 8.74926 5.38285 7.75218C4.44239 6.2087 6.2087 4.44239 7.75219 5.38285C8.74926 5.99037 10.0492 5.45193 10.3246 4.31731Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path
                                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                </svg>

                                <span class="mx-4 font-medium">Status</span>
                            </Link>

                            <hr class="my-6 border-gray-200 dark:border-gray-600"/>
                        </nav>
                    </div>
                </aside>
                <aside class="sm:hidden  flex flex-col items-center w-16 h-screen py-8 overflow-y-auto bg-white border-r rtl:border-l rtl:border-r-0 dark:bg-gray-900 dark:border-gray-700">
                    <nav class="flex flex-col flex-1 space-y-6">
                        <Link :href="route('dashboard')" class="inline-flex items-center gap-2">
                            <ApplicationLogo
                                class="block h-9 w-auto fill-current text-gray-800"
                            />
                        </Link>

                        <a href="#" class="p-1.5 text-gray-700 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-gray-200 dark:hover:bg-gray-800 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </a>

                        <a href="#" class="p-1.5 text-gray-700 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-gray-200 dark:hover:bg-gray-800 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                        </a>

                        <a href="#" class="p-1.5 text-gray-700 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-gray-200 dark:hover:bg-gray-800 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                            </svg>
                        </a>

                        <a href="#" class="p-1.5 text-gray-700 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-gray-200 dark:hover:bg-gray-800 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0l2.77-.693a9 9 0 016.208.682l.108.054a9 9 0 006.086.71l3.114-.732a48.524 48.524 0 01-.005-10.499l-3.11.732a9 9 0 01-6.085-.711l-.108-.054a9 9 0 00-6.208-.682L3 4.5M3 15V4.5" />
                            </svg>
                        </a>

                        <a href="#" class="p-1.5 text-gray-700 focus:outline-nones transition-colors duration-200 rounded-lg dark:text-gray-200 dark:hover:bg-gray-800 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                        </a>
                    </nav>
                </aside>
                <div class="sm:flex-1 sm:px-0 sm:ml-64 w-full px-4 ">
                    <!-- Page Content -->
                    <main>
                        <div class="py-8">
                            <div class="w-full flex mx-auto sm:px-6 lg:px-8">
                                <nav class="bg-white w-full border-b border-gray-100">
                                    <!-- Primary Navigation Menu -->
                                    <div class="w-full mx-auto px-4 sm:px-6 lg:px-8">
                                        <div class="flex justify-between h-16">
                                            <div class="flex">
                                                <!-- Logo -->
                                                <div class="shrink-0 flex items-center">
                                                    <Link :href="route('dashboard')">
                                                        <ApplicationLogo
                                                            class="block h-9 w-auto fill-current text-gray-800"
                                                        />
                                                    </Link>
                                                </div>

                                                <!-- Navigation Links -->
                                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                                    <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                                        Dashboard
                                                    </NavLink>
                                                </div>
                                            </div>

                                            <div class="hidden sm:flex sm:items-center sm:ms-6">
                                                <!-- Settings Dropdown -->
                                                <div class="ms-3 relative">
                                                    <Dropdown align="right" width="48">
                                                        <template #trigger>
                                                            <div class="inline-flex rounded-md">
                                                                <button
                                                                    type="button"
                                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                                                >
                                                                    {{ $page.props.auth.user.name }}

                                                                    <svg
                                                                        class="ms-2 -me-0.5 h-4 w-4"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 20 20"
                                                                        fill="currentColor"
                                                                    >
                                                                        <path
                                                                            fill-rule="evenodd"
                                                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd"
                                                                        />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </template>

                                                        <template #content>
                                                            <DropdownLink :href="route('logout')" method="post" as="button">
                                                                Log Out
                                                            </DropdownLink>
                                                        </template>
                                                    </Dropdown>
                                                </div>
                                            </div>

                                            <!-- Hamburger -->
                                            <div class="-me-2 flex items-center sm:hidden">
                                                <button
                                                    @click="showingNavigationDropdown = !showingNavigationDropdown"
                                                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                                                >
                                                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                        <path
                                                            :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 6h16M4 12h16M4 18h16"
                                                        />
                                                        <path
                                                            :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M6 18L18 6M6 6l12 12"
                                                        />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Responsive Navigation Menu -->
                                    <div
                                        :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                                        class="sm:hidden"
                                    >
                                        <div class="pt-2 pb-3 space-y-1">
                                            <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                                Dashboard
                                            </ResponsiveNavLink>
                                        </div>

                                        <!-- Responsive Settings Options -->
                                        <div class="pt-4 pb-1 border-t border-gray-200">
                                            <div class="px-4">
                                                <div class="font-medium text-base text-gray-800">
                                                    {{ $page.props.auth.user.name }}
                                                </div>
                                                <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                                            </div>

                                            <div class="mt-3 space-y-1">
                                                <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                                                <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                                    Log Out
                                                </ResponsiveNavLink>
                                            </div>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <slot/>
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>
