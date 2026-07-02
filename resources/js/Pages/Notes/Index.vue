<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";

defineProps({
    notes: Array,
});

const form = useForm({
    title: "",
    body: "",
});

function submit() {
    form.post(route("notes.store"), {
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <Head title="Notes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Notes</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="mb-6 space-y-4">
                        <input
                            v-model="form.title"
                            type="text"
                            placeholder="Title"
                            class="w-full rounded-md border-gray-300 shadow-sm"
                        />
                        <textarea
                            v-model="form.body"
                            placeholder="Note"
                            class="w-full rounded-md border-gray-300 shadow-sm"
                        ></textarea>
                        <button type="submit" class="rounded-md bg-gray-800 px-4 py-2 text-white">
                            Add note
                        </button>
                    </form>

                    <ul class="divide-y divide-gray-200">
                        <li v-for="note in notes" :key="note.id" class="py-3">
                            <p class="font-medium">{{ note.title }}</p>
                            <p class="text-sm text-gray-500">{{ note.body }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
