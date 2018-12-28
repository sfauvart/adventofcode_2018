use std::collections::HashMap;

fn main() {
    let data = include_str!("data.txt");

    let boxids = data.
        split_whitespace().
        map(|boxid| {
            let mut cache = HashMap::new();

            // on compte l'occurence de chaque caractère dans une Map
            boxid.chars().for_each(|c| {
                *cache.entry(c).or_insert(0) += 1;
            });

            (boxid, cache)
        });

    let mut twotimes = 0;
    let mut treetimes = 0;
    for tuple in boxids {
        println!("{:?}", tuple);

        if tuple.1.values().any(|&x| x == 2) {
            twotimes+=1;
        }
        if tuple.1.values().any(|&x| x == 3) {
            treetimes+=1;
        }
    }
    println!("checksum : {:?}", twotimes * treetimes);
}