import { createReduxStore, register } from '@wordpress/data';

import * as actions from './actions';
import * as controls from './controls';
import reducer from './reducer';
import * as resolvers from './resolvers';
import * as selectors from './selectors';

const store = createReduxStore('visual-portfolio', {
	selectors,
	actions,
	controls,
	resolvers,
	reducer,
});

register(store);
