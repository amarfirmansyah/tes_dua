import axios from "axios";

const BASEURL = '/category'
class CategoryService {
    async getAll() {
        return await axios.get(BASEURL + '/all')
            .then(response => response)
    }

    async edit(data: object, id: number) {
        return await axios.patch(BASEURL + `/edit/${id}`, data)
            .then(response => response)
    }

    async delete(id: number) {
        return await axios.post(BASEURL + `/delete/${id}`)
            .then(response => response)
    }
}

export default new CategoryService()
