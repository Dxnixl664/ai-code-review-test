<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import SearchFilter from "@/Components/SearchFilter.vue";
import { Head } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const props = defineProps({
    members: Array,
});

const query = ref("");

const filtered = computed(() => {
    if (!query.value) {
        return props.members;
    }

    return props.members.filter((member) =>
        member.name.toLowerCase().includes(query.value.toLowerCase())
    );
});
</script>

<template>
    <Head title="Team" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Team</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <SearchFilter v-model="query" placeholder="Search team members..." class="mb-4" />

                    <ul class="divide-y divide-gray-200">
                        <li v-for="member in filtered" :key="member.id" class="py-2">
                            {{ member.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
