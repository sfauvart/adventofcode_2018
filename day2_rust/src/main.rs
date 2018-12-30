use std::collections::HashMap;
use itertools::Itertools;

fn part1() {
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

fn part2() {
    let data = include_str!("data.txt");

    let boxids = data.
        split_whitespace();

    // cartesian_product --> pour chaque entrée de la liste on affecte la liste complète
    // find --> on va rechercher les entrées qui ont que 1  seul caractère de différent
    // zip --> permet d'assembler deux tableaux
    // unwrap car renvoi un type Option
    let closest_box_ids = boxids.clone().
        cartesian_product(boxids).
        find(|(a, b)| {
            let num_differing = a.chars()
                .zip(b.chars())
                .filter(|(a, b)| a != b)
                .count();

            num_differing == 1
        }).unwrap();

    // Maintenant, on a deux box id avec 1 seul caractère de diff
    // on filtre donc les deux chaînes du caractère différent
    let common_letters = closest_box_ids.0.chars()
        .zip(closest_box_ids.1.chars())
        .filter(|(a, b)| a == b)
        .map(|(a, _)| a)
        .collect::<String>();

    println!("common letters : {:?}", common_letters);
}

fn main() {
    part1();
    part2();
}