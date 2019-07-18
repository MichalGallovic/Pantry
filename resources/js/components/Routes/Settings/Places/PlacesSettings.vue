<template>
    <Loading v-if="isLoading"></Loading>
    <section v-else>
        <div class="flex">
            <Heading>Places</Heading>
            <PlusButton @click.native="toggleCreate"></PlusButton>
        </div>
        <table class="mt-4 rounded rounded-lg">
            <thead class="bg-gray-300">
            <tr class="text-left">
                <th class="uppercase text-gray-600 p-4 text-sm">Id</th>
                <th class="uppercase text-gray-600 p-4 text-sm">Name</th>
                <th class="uppercase text-gray-600 p-4 text-sm">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr class="text-left" v-for="place in places" v-if="isEditing(place.id)">
                <td class="p-4">{{ place.id }}</td>
                <td class="p-4">
                    <span><input type="text" v-model="place.name"></span>
                </td>
                <td class="p-4">
                    <span class="hover:text-gray-800 text-gray-600" @click="update(place)">Save</span>
                    <span class="cursor-pointer text-gray-600 hover:text-gray-800" @click="cancelEditing">Cancel</span>
                </td>
            </tr>
            <tr class="text-left" v-else>
                <td class="p-4">{{ place.id }}</td>
                <td class="p-4">{{ place.name }}</td>
                <td class="p-4">
                    <span class="hover:text-gray-800 text-gray-600" @click="edit(place.id)"><i class="fa fa-edit"></i></span>
                    <span class="cursor-pointer text-gray-600 hover:text-gray-800" @click="remove(place)"><i class="ml-4 fa fa-trash"></i></span>
                </td>
            </tr>

            <tr v-if="createMode">
                <td class="p-4"></td>
                <td class="p-4"><input type="text" v-model="name"></td>
                <td class="p-4">
                    <span class="cursor-pointer" @click="create">Add</span>
                    <span class="cursor-pointer" @click="toggleCreate">Cancel</span>
                </td>
            </tr>
            </tbody>
        </table>
    </section>
</template>

<script>
import Loading from '../../../Loading';
import Heading from '../../../StyledComponents/Heading';
import PlusButton from '../../../StyledComponents/Buttons/PlusButton';
import { RepositoryFactory } from "../../../../Repositories/RepositoryFactory";
const PlaceRepository = RepositoryFactory.get('place');

export default {
    components: {
        Loading,
        Heading,
        PlusButton
    },
    data () {
        return {
            places: [],
            isLoading: false,
            createMode: false,
            editingId: null,
            name: null
        }
    },
    created () {
        this.fetchPlaces();
    },
    methods: {
        async fetchPlaces () {
            this.isLoading = true;
            const { data } = await PlaceRepository.get([]);
            this.isLoading = false;
            this.places = data;
        },
        async remove (place) {
            await PlaceRepository.delete(place.id);
            this.fetchPlaces();
        },
        async create () {
            await PlaceRepository.create({name: this.name});
            this.toggleCreate();
            this.fetchPlaces();
        },
        async update (place) {
            await PlaceRepository.update(place.id, {name: place.name});
            this.cancelEditing();
            this.fetchPlaces();
        },
        toggleCreate () {
            this.name = null;
            this.createMode = !this.createMode;
        },
        isEditing (id) {
            return id === this.editingId;
        },
        edit (id) {
            this.editingId = id;
        },
        cancelEditing () {
            this.editingId = null;
        }
    }
};
</script>
