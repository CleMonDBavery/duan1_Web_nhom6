import {Choice} from './choice';

export interface Item extends Choice {
    choiceId?: number;
    highlighted?: boolean;
}
