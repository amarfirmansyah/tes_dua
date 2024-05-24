export interface List {
    id?: number | null;
    name?: string | null;
}

export interface Units {
    id?: number | null;
    name?: string | null;
    description?: string | null;
    type?: string | null;
}

export interface Product {
    id?: number | null;
    name?: string | null;
    manufacturer?: List | null;
    category?: List | null;
    status?: List | null;
    unit?: List | null;
}

export interface Condition {
    total?: number | null,
    status?: string | null
}

export interface Diagram {
    name?: string | null,
    categories?: Array | null,
    count?: Array | null,
}
