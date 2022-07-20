import {prisma} from "./database";

export async function getAppSettings() {

    const array = await prisma.setting.findMany() || [];

    return array.map(({key, value}) => ({[key]: value})).reduce(((r, c) => Object.assign(r, c)), {})
}