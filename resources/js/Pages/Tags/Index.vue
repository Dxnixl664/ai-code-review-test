<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, router } from "@inertiajs/vue3";

defineProps({
    tags: Array,
});

const form = useForm({
    name: "",
});

function submit() {
    form.post(route("tags.store"), {
        onSuccess: () => form.reset(),
    });
}

function destroy(id) {
    router.delete(route("tags.destroy", id));
}
</script>

<template>
    <Head title="Tags" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Tags</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white p-6 shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="mb-6 flex gap-2">
                        <input
                            v-model="form.name"
                            type="text"
                            placeholder="New tag"
                            class="w-full rounded-md border-gray-300 shadow-sm"
                        />
                        <button type="submit" class="rounded-md bg-gray-800 px-4 py-2 text-white">
                            Add
                        </button>
                    </form>

                    <ul class="divide-y divide-gray-200">
                        <li
                            v-for="tag in tags"
                            :key="tag.id"
                            class="flex items-center justify-between py-2"
                        >
                            <span>{{ tag.name }}</span>
                            <button
                                @click="destroy(tag.id)"
                                class="text-sm text-red-600 hover:text-red-800"
                            >
                                Delete
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
