<script setup lang="ts">
import {TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogTitle} from "@headlessui/vue";
import {ref} from 'vue';
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import {useForm} from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {List} from "@/Interfaces/component";
import ListBox from "@/Components/ListBox.vue";
import CreateUnit from "@/Pages/Unit/Create.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import EditUnit from "@/Pages/Unit/Edit.vue";
import UnitService from "@/Services/unit.service";

const isOpen = ref<Boolean>(false)
const emit = defineEmits(['load'])
const props = defineProps(['data', 'manufacturer', 'categories', 'statuses', 'units'])
const closeModal = () => {
    isOpen.value = false
    form.reset()
}

const openModal = () => {
    isOpen.value = true
}

const form = useForm<{
    name: string | null,
    manufacturer: List,
    category: List,
    status: List,
    unit: List,
}>({
    name: props.data.name ?? '',
    manufacturer: props.data.manufacturer ?? {name: '-- select --', id: null},
    category: props.data.category ?? {name: '-- select --', id: null},
    status: props.data.status ?? {name: '-- select --', id: null},
    unit: props.data.unit ?? {name: '-- select --', id: null},
})

const submit = () => {
    form.patch(route('product.edit', {product: props.data?.id}), {
        onError: params => {
            console.log(params)
        },
        onFinish: () => {
            alert('Edit product successfully')
            emit('load', true)
            closeModal()
        }
    })
}

const loadUnit = () => {
    emit('load', true)
}

const destroyUnit = (id: any) => {
    let value = confirm('are you sure delete this record')
    if (value) {
        UnitService.delete(id)
            .then(() => emit('load', true))
            .catch(err => console.log(err))

        closeModal()
    }

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
                            class="w-full max-w-3xl transform rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <form @submit.prevent="submit">
                                <DialogTitle
                                    as="h3"
                                    class="text-lg font-medium leading-6 text-gray-900"
                                >
                                    Edit Product
                                </DialogTitle>
                                <div class="mt-6 grid grid-cols-4 gap-3">
                                    <div class="col-span-4">
                                        <InputLabel for="name" value="Name Category"/>

                                        <TextInput
                                            id="name"
                                            type="name"
                                            class="mt-1 block border py-1.5 pl-2 w-full"
                                            v-model="form.name"
                                            required
                                            autofocus
                                        />

                                        <InputError class="mt-2" :message="form.errors.name"/>
                                    </div>
                                    <div class="col-span-2">
                                        <InputLabel for="manufacturer" value="Merek"/>
                                        <ListBox v-model="form.manufacturer" :data="manufacturer"/>
                                    </div>
                                    <div class="col-span-2">
                                        <InputLabel for="categories" value="Categories"/>
                                        <ListBox v-model="form.category" :data="categories"/>
                                    </div>
                                    <div class="col-span-4">
                                        <InputLabel for="status" value="Status"/>
                                        <ListBox v-model="form.status" :data="statuses"/>
                                    </div>
                                    <div class="w-full col-span-4 grid grid-cols-6 gap-2 items-end justify-between">
                                        <div class="col-span-2">
                                            <InputLabel for="unit" value="Unit"/>
                                            <ListBox v-model="form.unit" :data="units"/>
                                        </div>
                                        <div class="w-full col-span-4 flex flex-row gap-3">
                                            <CreateUnit @load="loadUnit"/>
                                            <EditUnit :data="form.unit" @load="loadUnit"/>
                                            <div
                                                @click="destroyUnit(form.unit.id)"
                                                class="inline-flex items-center px-4 py-2 bg-red-400 cursor-pointer border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                            >
                                                Delete Unit
                                            </div>
                                        </div>
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
