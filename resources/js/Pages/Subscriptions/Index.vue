<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    subscriptions: Array,
});
</script>

<template>
    <Head title="Active Subscriptions" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Active Subscriptions</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <ul class="divide-y divide-gray-200">
                        <li v-for="sub in subscriptions" :key="sub.id" class="py-3">
                            <p class="font-medium">{{ sub.plan_name }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
