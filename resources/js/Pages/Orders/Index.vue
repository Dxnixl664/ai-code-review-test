<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";

const props = defineProps({
    orders: Array,
    page: Number,
});

function goToPage(page) {
    router.get(route("orders.index"), { page }, { preserveState: true });
}
</script>

<template>
    <Head title="Order History" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Order History</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <ul class="divide-y divide-gray-200">
                        <li v-for="order in orders" :key="order.id" class="py-3">
                            <p class="font-medium">Order #{{ order.id }}</p>
                            <p class="text-sm text-gray-500">${{ order.total }}</p>
                        </li>
                    </ul>

                    <div class="mt-6 flex gap-2">
                        <button
                            v-if="page > 1"
                            @click="goToPage(page - 1)"
                            class="rounded-md bg-gray-200 px-3 py-1 text-sm"
                        >
                            Previous
                        </button>
                        <button @click="goToPage(page + 1)" class="rounded-md bg-gray-200 px-3 py-1 text-sm">
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
