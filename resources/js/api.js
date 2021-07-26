import UserResource from './resources/user';

export default {
  async initialize(dictNames, callback) {
    const user = await UserResource.fetch();
    const dicts = await this.dicts(dictNames);
    if (callback) callback(user, dicts);
  },
};
