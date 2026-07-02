<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CartRow from "@/Components/CartRow.vue";
import { Head } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const items = ref([
    { id: 1, name: "Widget", quantity: 2 },
    { id: 2, name: "Gadget", quantity: 1 },
]);

const totalItems = computed(() => items.value.reduce((sum, item) => sum + item.quantity, 0));
</script>

<template>
    <Head title="Cart" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Cart</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <CartRow v-for="item in items" :key="item.id" :item="item" />

                    <p class="mt-4 text-sm text-gray-500">Total items: {{ totalItems }}</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
