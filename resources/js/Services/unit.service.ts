import axios from "axios";

const BASEURL :string = '/unit';
class UnitService {
    async getAll() {
        return await axios.get(BASEURL + '/all')
            .then(response => response)
    }

    async delete(id :number) {
        return await axios.post(BASEURL + `/delete/${id}`)
            .then(response => response)
    }
}

export default new UnitService()
