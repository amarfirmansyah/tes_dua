<script setup lang="ts">
import {TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogTitle} from "@headlessui/vue";
import {ref, watch} from 'vue';
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm} from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";

const isOpen = ref<Boolean>(false)
const emit = defineEmits(['load'])
const props = defineProps(['data'])
const closeModal = () => {
    isOpen.value = false
}

const openModal = () => {
    isOpen.value = true
}

const form = useForm<{
    id: number | string,
    name: string | null,
    description: string | null,
    type: string | null
}>({
    id: props.data.id ?? '',
    name: props.data.name ?? '',
    description: props.data.description ?? '',
    type: props.data.type ?? '',
})

watch(() => props.data, (newVal) => {
    form.id = newVal.id
    form.name = newVal.name
    form.description = newVal.description
    form.type = newVal.type
})

const edit = () => {
    form.patch(route('unit.edit', {unit: props.data?.id}), {
        onError: params => {
            console.log(params)
        },
        onFinish: () => {
            alert('Edit unit successfully')
            emit('load', true)
            closeModal()
        }
    })
}
</script>
<template>
    <div class="flex items-center justify-end">
        <SecondaryButton
            type="button"
            @click="openModal">
            Edit
        </SecondaryButton>
    </div>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black/25"/>
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-md transform rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <form @submit.prevent="edit">
                                <DialogTitle
                                    as="h3"
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Edit Unit
                                </DialogTitle>
                                <div class="mt-6 flex flex-col gap-4">
                                    <div>
                                        <InputLabel for="name" value="Name Unit"/>

                                        <TextInput
                                            id="name"
                                            type="text"
                                            class="mt-1 block border py-1.5 pl-2 w-full"
                                            v-model="form.name"
                                            required
                                            autofocus
                                        />

                                        <InputError class="mt-2" :message="form.errors.name"/>
                                    </div>
                                    <div>
                                        <InputLabel for="desc" value="Description"/>

                                        <TextInput
                                            id="desc"
                                            type="text"
                                            class="mt-1 block border py-1.5 pl-2 w-full"
                                            v-model="form.description"
                                            required
                                            autofocus
                                        />

                                        <InputError class="mt-2" :message="form.errors.description"/>
                                    </div>
                                    <div>
                                        <InputLabel for="type" value="Type"/>

                                        <TextInput
                                            id="type"
                                            type="text"
                                            class="mt-1 block border py-1.5 pl-2 w-full"
                                            v-model="form.type"
                                            required
                                            autofocus
                                        />

                                        <InputError class="mt-2" :message="form.errors.description"/>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button
                                        :disabled="form.processing"
                                        type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-blue-100 px-4 py-2 text-sm font-medium text-blue-900 hover:bg-blue-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2"
                                    >
                                        Edit
                                    </button>
                                </div>
                            </form>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
