import helpers from "../helpers/helpers.js";

export const getCharacters = async (page) => {
    try {
        const response = await axios.get(`${import.meta.env.VITE_API_URL}/character?page=${page}`);

        if (response.status !== 200) {
            return helpers.formatError(response)
        }

        return response.data.results
    } catch (error) {
        return helpers.formatError(error)
    }
}

export const getCharacter = async (id) => {
    try {
        const response = await axios.get(`${import.meta.env.VITE_API_URL}/character/${id}`);

        if (response.status !== 200) {
            return helpers.formatError(response)
        }

        return response.data
    } catch (error) {
        return helpers.formatError(error)
    }
}
