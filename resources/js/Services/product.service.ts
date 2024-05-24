import axios from "axios";

const BASEURL :string = '/product'
class ProductService {
    async getAll() {
        return await axios.get(BASEURL + '/all')
            .then(response => response)
    }

    async delete(id) {
        return await axios.post(BASEURL + `/delete/${id}`)
            .then(response => response)
    }

    async checkCondition() {
        return await axios.get(BASEURL + '/check/condition')
            .then(response => response)
    }

    async diagram() {
        return await axios.get(BASEURL + '/info/diagram')
            .then(response => response)
    }
}

export default new ProductService()
